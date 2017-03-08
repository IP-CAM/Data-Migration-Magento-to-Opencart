<?php
require_once('autoload.php');

date_default_timezone_set('Asia/Singapore');

//Create a variable for start time
$time_start = microtime(true);

$variables = new ArgumentsVariable($argv);

$class = ucfirst($variables->getModule());
if (!class_exists($class)) {
    print "Module not found";
    exit();
}

$configuration = include('config.php');

$config = new Config($configuration);

$import = new $class($config, $variables->getFile(), $variables->getPrint());

if (!$variables->getAction()) {
    $variables->setAction();
}

if (method_exists($import, $variables->getAction())) {
    $action = $variables->getAction();
    $result = $import->{$action}();
}

//Create a variable for end time
$time_end = microtime(true);

//Subtract the two times to get seconds
$time = $time_end - $time_start;
echo "Completed 100%\n";

echo "\n" . 'Execution time : '.$time.' seconds' . "\n";
