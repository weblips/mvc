<?php
class db extends PDO{
	public function __construct() {
		$options = array(
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		if ($_GET['param'] == 'testerrorsql') {
			$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		}
		parent::__construct(self::$dbwrd, self::$user, self::$mgwrd, $options);
		self::$classCounter++;
	}
	public static function getInstCount() {
		return self::$classCounter;
	}
	public function __destruct() {
		self::$classCounter--;
		/*parent::__destruct();	*/
	}
	public function query($sql) {
		global $queryjjtimeqarr;
		if (defined('SITEROOT')) {
			$filecontent = trim(file_get_contents(SITEROOT . 'myfolder/busy/find/query.txt'));
			if ($filecontent != 'empty') {
				$fp = fopen(SITEROOT . 'myfolder/busy/find/query.txt', 'w');
				fwrite($fp, date('Y-m-d H:i:s') . ' - ' . $sql . ' - ' . $_SERVER['REQUEST_URI']);
				fclose($fp);
			}
		}
		$time_start = $this->microtime_float();
		$res = parent::query($sql);
		$time_end = $this->microtime_float();
		$raznitca = $time_end - $time_start;
		$queryjjtimeqarr[]=$sql.' ('.$raznitca.')';		
		return $res;
	}	
	//*
	// need standart whith $opt - flag
	public function prepare($sql, $opt=NULL) {
		global $queryjjtimeqarr;
		$queryjjtimeqarr[]=$sql;//.' ('.$raznitca.')';		
		return parent::prepare($sql);
	}	//*/
	function microtime_float() 
	{ 
	   list($usec, $sec) = explode(" ", microtime()); 
	   return ((float)$usec + (float)$sec); 
	}	
	private static $classCounter = 0;
	private static $user = "bookclub";
	private static $mgwrd = ",s,ksjntrf";
	private static $dbwrd = "mysql:dbname=bookclub;host=localhost";
}