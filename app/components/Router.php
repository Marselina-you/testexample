<?php

echo 'kuku';
class Router
{
	
    private $routes; //массив, в котором будут храниться маршруты

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php'; // 
		$this->routes = include($routesPath);
	}
	/**
 	* возвращает строку запроса 
 	*/
	private function getURI(){ 
		if (!empty($_SERVER['REQUEST_URI'])) {
     	return trim($_SERVER['REQUEST_URI'], '/'); //trim Удаляет пробелы (или другие символы) из начала и конца строки

     }
    

	}
	public function run() //принимает отправления от frontController 
						//анализ запроса и передача управления
	{
     echo 'kukuruza';
     echo '<pre>';
     print_r($this->routes);
     $uri = $this->getURI();
     foreach ($this->routes as $uriPattern=>$Path) {
     	
     	if (preg_match("~$uriPattern~", $uri)) {

     		$internalRoute = preg_replace("~$uriPattern~", $Path, $uri);

//определить контроллер, action, параметры
     		$segments = explode('/', $internalRoute);

     		$controllerName = array_shift($segments).'Controller';
     		$controllerName = ucfirst($controllerName);

     		$actionName = 'action'.ucfirst(array_shift($segments));

     		echo '<br>controllerName: '.$controllerName;
     		echo '<br>actionName '.$actionName;
     		$parameters = $segments;
     		echo '<br>это запрос '.$uri;
     		echo '<br>это что ищем '.$uriPattern;
     		echo '<br>это кто обраб '.$Path;
     		echo '<pre>';
     		print_r($parameters);
     		
     		
     		
     		
     		
     		
     	}

     	//подключить файл класса-контроллера
     	$controllerFile = ROOT. '/controllers/'.$controllerName.'.php';
     		if (file_exists($controllerFile)){
     			include_once($controllerFile);
     		}
     		$controllerObject = new $controllerName;
     		$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
     		if ($result != null) {
     			break;
     			// code...
     		}
     		

     	
     }
     echo '<br>файл контроллер:'.$controllerFile;
    echo  '<br>Класс:'.$controllerName;
     		echo  '<br>Метод:'.$actionName;
	}
}