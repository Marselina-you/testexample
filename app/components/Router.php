<?php
echo 'kukul';
class Router
{

	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

// Return type

	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
		return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{
		$uri = $this->getURI();

		foreach ($this->routes as $uriPattern => $path) {

			if(preg_match("~$uriPattern~", $uri)) {

				echo '<br>набрал юзер '.$uri;
				echo '<br>что ищем '.$uriPattern;
				echo '<br>кто обр '.$path;

				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				echo '<br>Что нужно смформировать '.$internalRoute;
				$segments = explode('/', $internalRoute);

				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);


				$actionName = 'action'.ucfirst(array_shift($segments));

				$parameters = $segments;


				$controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}
				echo '<pre>';
				print_r($parameters);
				echo '<br>controllerName ';
				print_r($controllerName);
				echo '<br>actionName ';
				print_r($actionName);
				echo '<pre>';
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if ($result != null) {
					break;
				}
				

			}

		}
	}
}