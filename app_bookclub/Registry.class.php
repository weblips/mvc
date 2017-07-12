<?php
class Registry {

	private $tools = array(); // array
	private static $instance; // object


	/**
	 * Private constructor does nothing
	 *
	 */
	final private function __construct(){
		/* ... */
	}


	/**
	 * Return the single instance of object
	 *
	 * @return object
	 	 */
	public static function & __instance(){
		if (!isset(self :: $instance))
			self :: $instance = new self;
		return self :: $instance;
	}


	/**
	* Register tools
	*
	* @param object|string $tool
	* @param string $name
	* @param array $p
	* @return object
	*/
	public static function & register($tool, $name='', $p=null, $f='__instance'){
		if (is_string($tool) && !$name)
			$name = $tool;
		$instance = self :: __instance();
		
		$instance->tools[$name] = $instance->factory($tool, $p, $f);
		$result = $instance->tools[$name];
		return $result;
	}


	/**
	 * Unregister tools
	 *
	 * @param string $name
	 * @param bool $force
	 */
	public static function unregister($name, $force=false){
		$instance = self :: __instance();
		unset($instance->tools[$name]);
		if ($force && is_callable(array($name,"__kill")))
	   		call_user_func(array($name,"__kill"));
	}


	/**
	 * Search for tool
	 *
	 * @param srting $name
	 * @return bool
	 */
	public static function has($name){
		$instance = self :: __instance();
		if (isset($instance->tools[$name]))
			return true;
		return false;
	}


	/**
	 * Factory method
	 *
	 * @param string|object $name
	 * @return object
	 */
	public static function & factory($name,$params=null,$func="__instance"){
		if (is_object($name))
			return $name;
		if (!class_exists($name) && is_callable("__autoload"))
			__autoload($name);
				
		if (class_exists($name)){
			if(is_callable(array($name,$func))){
				$result = call_user_func_array(array($name,$func),$params); // метод $name::$func вызван статично
				throw new RegistryException("Class '$name' static loaded!");
				return $result;
			}else if(!$params){ // пытаемся сэкономить время
				$result = new $name();
//				echo '<img width="0" height="0" src="'.$name.$params.'" />';
				return $result;
			}else{
				$reflection = new ReflectionClass($name);
				$result = $reflection->newInstanceArgs($params);
				return $result;
			}
		}
		throw new RegistryException("Class '$name' doesn't declared and can't be loaded!");


	}


	/**
	 * Access method for tools
	 *
	 * @param string $name
	 * @return object
	 */
	public static function & extract($name){
		if (!self :: has($name)) {
			self :: factory($name);
		}
		$instance = self :: __instance();
		$result = $instance->tools[$name];
		return $result;
	}


	/**
	 * Overload
	 *
	 * @param string $name
	 * @return object
	 */
	public function __get($name){
		return self :: extract($name);
	}


	/**
	 * Overload
	 *
	 * @param string $name
	 * @param object|string $tool
	 * @return object
	 */
	public function __set($name,$tool){
		return self :: register($tool,$name);
	}


	/**
	 * Cloning is deprecated
	 *
	 */
	public function __clone(){
		throw new RegistryException('Clone is not allowed!');
	}


	/**
	 * Destroy all tools
	 *
	 */
	public function __destruct(){
		$instance = self :: __instance();
		$tools = array_reverse(array_keys($instance->tools),true);
		foreach ($tools as $name){
			self :: unregister($name,true);
		}
	}
}
class RegistryException extends Exception{
}