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

class File {

	var $file = '';

	/**
	 * Constuct
	 */
	public function __construct()
	{
		//
		echo '<hr>';
	}

    public function exists()
    {
        return file_exists($this->file);
    }

    public function get($assoc = false)
    {
        return json_decode(file_get_contents($this->getPath()), $assoc);
    }

    public function load($file)
    {
		$this->file = $file;

        if ($this->exists())
        {
			  require_once($this->file);
			  return $config;
        }
		else
		{
			echo 'file does not exists';
		}

       // throw new LazerException($type . ': File does not exists');
    }

}


