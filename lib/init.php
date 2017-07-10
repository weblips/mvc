<?php

require_once ROOT.DS.'config'.DS.'config.php';

function __autoload($class_name) {
	// in lib class write test.class.php (class in file Test)
	$lib_path = ROOT.DS.'lib'.DS.strtolower($class_name).'.class.php';
	// controller TestController.php
	$controllers_path = ROOT.DS.'controllers'.DS.str_ireplace('controller', '', ucfirst($class_name)).'Controller.php';
	// madel: Test.php
	$model_path = ROOT.DS.'models'.DS.ucfirst($class_name).'.php';

	if (file_exists($lib_path)) {
		require_once $lib_path;
	} elseif (file_exists($controllers_path)) {
		require_once $controllers_path;
	} elseif (file_exists($model_path)) {
		require_once $model_path;
	} else {
		throw new Exception('Filed to include class: '.$class_name);
	};
}

function __($key, $default_value = '') {
	return Lang::get($key, $default_value);
}
