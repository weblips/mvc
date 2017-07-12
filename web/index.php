<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');

require_once ROOT.DS.'lib'.DS.'init.php';

App::run($_SERVER['REQUEST_URI']);

$arr = new Page();
        $arr = $arr->getList(true);
        echo('<pre>');
print_r($arr);
echo('</pre>');