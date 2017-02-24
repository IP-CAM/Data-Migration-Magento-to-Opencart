<?php

class Config
{
    private $data = array();

    public function __construct($config)
    {
        foreach ($config as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function get($key) {
        return (isset($this->data[$key]) ? $this->data[$key] : null);
    }

    public function set($key, $value) {
        $this->data[$key] = $value;
    }

    public function has($key) {
        return isset($this->data[$key]);
    }
}
