<?php
/**
* Router class
*/
class Router {

	public static $routes = array();

	public static function addRoute(array $route) {
		self::$routes = array_merge(self::$routes, $route);
	}

	// Получение путей
	public static function dispatch() {
		$route = $_SERVER['REQUEST_URI'];

		if (array_key_exists($route, self::$routes)) {
			$path = self::$routes[$route];
		} else {
			Router::redirect();
		}

		return $path;
	}

	// Подключение файлов
	public static function start() {
		@list($controllerName, $action) = explode('/', self::dispatch());

		// Путь к файлам
		$controllerPath = 'app/controller/'.$controllerName.'.php';
		$modelPath = 'app/model/'.$controllerName.'.php';

		// Подключение модели
		if (file_exists($modelPath)) {
			include $modelPath;
		} else {
			Router::redirect();
		}

		// Подключение контроллера
		if (file_exists($controllerPath)) {
			include $controllerPath;
		} else {
			Router::redirect();
		}

		// Экземпляр контроллера
		$modelName = 'model_'.$controllerName;
		$controllerName = 'controller_'.$controllerName;
		$controller = new $controllerName($modelName);

		if (method_exists($controller, $action)) {
			$controller->$action();
		} else {
			$controller->index();
		}

	}

	public static function redirect($location = '/') {
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location: '.$location);
	}

}