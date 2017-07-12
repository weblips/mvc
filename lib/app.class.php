<?php


/**
 * Description of app
 *
 * @author uasynzheryanua
 */
class App {
	protected static $router;
        
        public static $db;

        public static function getRouter() {
		return self::$router;
	}

	public static function run($uri) {
		self::$router = new Router($uri);
                
                self::$db = Db::getInstance();

		Lang::load(self::$router->getLanguage());

		$controller_class  = ucfirst(self::$router->getController().'Controller');
		$controller_method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());

		//Calling controller`s method
		$controller_obj = new $controller_class();
		if (method_exists($controller_obj, $controller_method)) {
			//Controller action may return path view
			$view_path = $controller_obj->$controller_method();
			$view_obj  = new View($controller_obj->getData(), $view_path);
			$content   = $view_obj->render();
		} else {
			throw new Exception("Method not found :".$controller_method);
		}
		$layout          = self::$router->getRoute();
		$layout_path     = VIEWS_PATH.DS.$layout.'.html';
		$layout_view_obj = new View(compact('content'), $layout_path);
		echo $layout_view_obj->render();
	}
}
