<?php
/**
 * [Request_Client_External] Curl driver performs external requests using the
 * php-curl extention. This is the default driver for all external requests.
 *
 * @package    App
 * @category   Base
 * @author     Zsolt Sándor
 * @copyright  (c) 2015 Zsolt Sándor
 * @license    http://kohanaframework.org/license
 * @uses       [PHP cURL](http://php.net/manual/en/book.curl.php)
 */



namespace Application;



class Debug {




	/**
	 * Constuct
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Logs messages/variables/data to browser console from within php
	 *
	 * @param $name: message to be shown for optional data/vars
	 * @param $data: variable (scalar/mixed) arrays/objects, etc to be logged
	 * @param $jsEval: whether to apply JS eval() to arrays/objects
	 *
	 * @return none
	 */
	public function logConsole($name, $data = NULL, $jsEval = FALSE)
	{
//		$this->name   = $name;
//		$this->data   = $data;
//		$this->jsEval = $jsEval;

		if(defined('DEBUG'))
		{
			$this->name   = $name;
			$this->data   = $data;
			$this->jsEval = $jsEval;

			$this->go();
		}
	}

	/**
	 * Logs messages/variables/data to browser console from within php
	 *
	 * @param $name: message to be shown for optional data/vars
	 * @param $data: variable (scalar/mixed) arrays/objects, etc to be logged
	 * @param $jsEval: whether to apply JS eval() to arrays/objects
	 *
	 * @return none
	 */
	 public function go()
	 {
 		$name = $this->name;
 		$data = $this->data;
 		$jsEval = $this->jsEval;

		if (! $name) return false;

		$isevaled = false;

		$type = ($data || gettype($data)) ? 'Type: ' . gettype($data) : '';

		if ($jsEval && (is_array($data) || is_object($data)))
		{
			$data = 'eval(' . preg_replace('#[\s\r\n\t\0\x0B]+#', '', json_encode($data)) . ')';
			$isevaled = true;
		}
		else
		{
			$data = json_encode($data);
		}
			
		// sanitalize
		$data = $data ? $data : '';
		$search_array = array("#'#", '#""#', "#''#", "#\n#", "#\r\n#");
		$replace_array = array('"', '', '', '\\n', '\\n');
		$data = preg_replace($search_array,  $replace_array, $data);
		$data = ltrim(rtrim($data, '"'), '"');
		$data = $isevaled ? $data : ($data[0] === "'") ? $data : "'" . $data . "'";

		extract($data, $name, $type);

		$js = include APPPATH . 'views/util/log.php';
		


		// echo $js;
	 }










}
 
 
/*
$debug = new PHPDebug();

$name = 'sarfraz';
$fruits = array("banana", "apple", "strawberry", "pineaple");

$user = new stdClass;
$user->name = "Sarfraz";
$user->desig = "Sr. Software Engineer";
$user->lang = "PHP";

$debug->logConsole('$name var', $name, true);
$debug->logConsole('An array of fruits', $fruits, true);
$debug->logConsole('$user object', $user, true);
*/









//
