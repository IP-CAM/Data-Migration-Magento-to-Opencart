<?php

class SalesFlatOrderPayment
{
    public function __construct($data)
    {
        $this->set($data);
    }

    public function setAttribute($data)
    {
        $this->set($data);
    }

    /**
     * Return a string if only single key array
     * @param array $value
     * @return mixed
     */
    private function filterValue($value)
    {
        if (is_array($value) && count($value) == 1) {
            foreach ($value as $v) {
                $value = $v;
            }
        }

        return $value;
    }

    private function set($data)
    {
        foreach ($data as $k => $v) {
            $className = get_class($this);
            if (property_exists($className, $k)) {
                $this->$k = addslashes($this->filterValue($v));
            }
        }
    }
}
?>
