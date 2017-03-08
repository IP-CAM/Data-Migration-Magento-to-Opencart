<?php

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
use Box\Spout\Common\Exception\IOException;

class Import extends Model
{
    private $headers = array();

    /**
     * php index.php --module=import --action=index
     */
    public function index()
    {
        $directory = 'import/';
        $files = scandir($directory);
        $reader = ReaderFactory::create(Type::XLSX);
        $config =  $this->config->get('db');
        $oc_prefix = isset($config['opencart']['prefix']) ? $config['opencart']['prefix'] : "";
        foreach ($files as $file) {
            $f = $directory . $file;
            if (is_file($f)) {
                try {
                    $reader->open($f);
                    /** @var Box\Spout\Reader\XLSX\Sheet $sheet */
                    foreach ($reader->getSheetIterator() as $sheet) {
                        $table = $oc_prefix . $sheet->getName();
                        if ($this->isTableExist($table)) {
                            foreach ($sheet->getRowIterator() as $row) {
                                if ($this->headers) {
                                    $this->updateData($table, $row);
                                } else {
                                    $this->headers = $row;
                                }
                            }
                        }

                    }
                } catch (IOException $exception) {}
            }
        }
    }

    private function updateData($table, $data)
    {
        $headers = $this->headers;
        $condition_field = $headers[0];
        $condition_value = $data[0];

        array_shift($data);
        array_shift($headers);
        $updates = array();
        foreach ($data as $key => $value) {
            $field = $headers[$key];
            $updates[] = "`{$field}` = '{$value}'";
        }
        $condition = "`{$condition_field}` = '{$condition_value}'";

        $update = implode(", ", $updates);

        $this->update($table, $update, $condition);
    }

    /**
     * php index.php --module=import --action=attribute --file=update_product_GP_v3.xlsx
     */
    public function attribute()
    {
        $languages = array(1, 2);
        $oc_prefix = isset($config['opencart']['prefix']) ? $config['opencart']['prefix'] : "";
        $reader = ReaderFactory::create(Type::XLSX);
        try {
            $reader->open('files/' . $this->getFile());
            /** @var Box\Spout\Reader\XLSX\Sheet $sheet */
            foreach ($reader->getSheetIterator() as $sheet) {
                $table = $oc_prefix . $sheet->getName();
                if ($this->isTableExist($table)) {
                    $this->truncate(array($table));
                    foreach ($sheet->getRowIterator() as $row) {
                        if ($this->headers) {
                            $data = $this->prepareInsertData($this->headers, $row);
                            foreach ($languages as $language) {
                                $data['language_id'] = $language;
                                $this->insertArray($table, $data);
                            }

                        } else {
                            $this->headers = $row;
                        }
                    }
                }

            }
        } catch (IOException $exception) {}
    }


    private function prepareInsertData($headers, $values)
    {

        $data = array();
        foreach ($values as $key => $value) {
            $data[$headers[$key]] = $value;
        }

        return $data;
    }
}
