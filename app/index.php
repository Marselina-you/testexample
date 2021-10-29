<?php 




ini_set('display_errors', 1);
	error_reporting(E_ALL); //отображение ошибок
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
	
	
	echo $_SERVER['DOCUMENT_ROOT']; 
	echo '<pre>';
	$pizza ='Я съеллл две пиццы';
	$pattern = '/(ц{1,})/';
	$res = preg_match($pattern, $pizza);
	var_dump($res);

	$router = new Router;
	$router->run();

	$string = '21-11-2021';
	$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';//не ставь пробелы, иначе не работает
	$replacement = 'Year $3, month $2, day $1';
	echo '<br>';
	echo preg_replace($pattern, $replacement, $string);
	die;

	