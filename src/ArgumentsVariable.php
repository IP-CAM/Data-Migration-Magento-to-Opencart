<?php

class ArgumentsVariable
{
    private $module = null;
    private $action = null;
    private $print = null;
    private $dryrun = null;
    private $file = null;
    
    public function __construct($argv)
    {
        $this->variables($argv);
    }

    /**
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action = "index")
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getDryRun()
    {
        return $this->dryrun;
    }

    /**
     * @return string
     */
    public function getPrint()
    {
        return $this->print;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $argv
     *
     * @return void
     */
    private function variables($argv)
    {
        foreach ($argv as $arg) {
            $array = explode('=', $arg);
            if (count($array) < 2) {
                continue;
            }
            list($key, $val) = $array;
            $key = ltrim($key, '--');
            if ($val && property_exists($this, $key)) {
                $this->setBoolean($val);
                $this->$key = $val;
            }
        }
    }

    /**
     * @param string $val
     */
    private function setBoolean(&$val)
    {
        if ($val === "false" || $val === "true") {
            $val = filter_var($val, FILTER_VALIDATE_BOOLEAN);
        }
    }
}
