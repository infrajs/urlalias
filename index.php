<?php
namespace infrajs\Alias;
if (!is_file('vendor/autoload.php')) {
	chdir('../'); //Согласно фактическому расположению файла
	require_once('vendor/autoload.php');
}

Alias::init();

?>