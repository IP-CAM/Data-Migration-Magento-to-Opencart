<?php

class Model
{
    private $print = false;

    /**
     * @var PDO
     */
    protected $dbOc = null;

    /**
     * @var PDO
     */
    protected $dbM = null;

    /**
     * @var Config
     */
    protected $config;

    /**
     * Model constructor.
     * @param Config $config
     * @param bool $print
     */
    public function __construct(Config $config, $print = false)
    {
        $this->config = $config;

        $db_config = $this->config->get('db');
        $this->setDbOc($db_config['opencart']);
        $this->setDbM($db_config['magento']);
        $this->print = $print;
    }

    private function setDbOc($db_config)
    {
        if (!$this->dbOc) {
            $this->dbOc = new PDO('mysql:host=' .$db_config['hostname'] .
                ';dbname=' . $db_config['database'] .
                ';charset=utf8mb4', $db_config['username'], $db_config['password']);
        }
    }

    private function setDbM($db_config)
    {
        if (!$this->dbM) {
            $this->dbM = new PDO('mysql:host=' .$db_config['hostname'] .
                ';dbname=' . $db_config['database'] .
                ';charset=utf8mb4', $db_config['username'], $db_config['password']);
        }
    }

    protected function queryOC($sql, $object = false)
    {
        return $this->query($this->dbOc, $sql, $object);
    }

    protected function queryM($sql, $object = false)
    {
        return $this->query($this->dbM, $sql, $object);
    }

    private function query($connection, $sql, $object)
    {
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        if ($object) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    protected function columnExists($table, $column) {
        try {
            $sql = "SHOW COLUMNS FROM ${table} LIKE '$column'";
            $result = $this->singleQueryM($sql);
            return !empty($result);
        } catch ( PDOException $e ) {}
        return FALSE;
    }

    protected function singleQueryM($sql, $object = false)
    {
        return $this->singleQuery($this->dbM, $sql, $object);
    }

    protected function singleQueryOc($sql, $object = false)
    {
        return $this->singleQuery($this->dbOc, $sql, $object);
    }

    private function singleQuery($connection, $sql, $object)
    {
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        if ($object) {
            $result = $stmt->fetch(PDO::FETCH_OBJ);
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    protected function truncate($tables, $isOc = true)
    {
        foreach ($tables as $table) {
            $sql = sprintf("TRUNCATE TABLE %s", $table);
            $this->execute($sql, '', $isOc);
        }
    }

    /**
     * @param string $table
     * @param string $values
     * @param string $fields
     * @return string|void
     */
    protected function insert($table, $values, $fields = "")
    {
        if (!empty($fields)) {
            $fields = "($fields)";
        }
        $sql = sprintf("INSERT INTO %s %s VALUES (%s)", $table, $fields, $values);

        return $this->execute($sql);
    }

    private function execute($sql, $alias = "", $isOc = true)
    {

        $hideOutput = "";
        $print = $this->print;

        if (empty($alias)) {
            $output = "Command: " . $sql . "\n\rResult : ";
        } else {
            $output = "Command: " . $alias . "\n\rResult : ";
        }

        if ($this->print) {
            echo $output;
        } else {
            $hideOutput = $output;
        }

        $output = "TRUE";
        if ($isOc) {
            $stmt = $this->dbOc->prepare($sql);
        } else {
            $stmt = $this->dbM->prepare($sql);
        }

        if (!$stmt->execute()) {
            $output = $hideOutput . "FALSE (" . $stmt->errorInfo()[2] . ")";
            $print = true;
        }

        if ($print) {
            echo $output;
            echo "\n\r" . str_repeat("-", 70) . "\n";
        }

        if (strpos($sql, 'INSERT') !== false) {
            if ($isOc) {
                $lastId = $this->dbOc->lastInsertId();
            } else {
                $lastId = $this->dbM->lastInsertId();
            }

            return $lastId;
        }

        return;
    }

    /**
     * @param string $table
     * @param array $data
     */
    protected function insertArray($table, $data)
    {
        $values = array();
        $fields = array();

        foreach ($data as $key => $val) {
            $values[] = "'{$val}'";
            $fields[] = "`{$key}`";

        }

        $this->insert($table, implode(", ", $values), implode(", ", $fields));
    }
}