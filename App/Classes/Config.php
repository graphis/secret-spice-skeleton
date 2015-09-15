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

// config.class.php
/*
example usage
$config = Config::getInstance(PATH TO FILE, FILE TYPE);
echo $config->ip;
echo $config->db['host'];


example array file
<?php
return array( 
    'db' => array(
        'host' => 'localhost',
        'user' => 'user1',
        'pass' => 'mypassword'),

    'ip' => '123456',

)

*/   

class Config
{
    private static $_instance = null;
    public $options = array();

    /**
     * Retrieves php array file, json file, or ini file and builds array
     * @param $filepath Full path to where the file is located
     * @param $type is the type of file.  can be "ARRAY" "JSON" "INI"
     */ 
    private function __construct($filepath, $type = 'ARRAY')
    {
        switch($type) {
            case 'ARRAY':
                $this->options = include $filepath;
                break;

            case 'JSON':
                $this->options = json_decode(file_get_contents($filepath), true);
                break;  

            //TO-DO add Database option for settings. Table = id, property, value
            case 'DATABASE':
                $this->options = json_decode(file_get_contents($filepath), true);
                break;     
        }
    }

    private function __clone(){}

    public static function getInstance($filepath, $type = 'ARRAY')
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self($filepath, $type);
        }
        return self::$_instance;
    }

    /**
     * Retrieve value with constants being a higher priority
     * @param $key Array Key to get
     */
    public function __get($key)
    {
        if (isset($this->options[$key])) {
            return $this->options[$key];
        }else{
            trigger_error("Key $val does not exist", E_USER_NOTICE);
        }
    }

    /**
     * Set a new or update a key / value pair
     * @param $key Key to set
     * @param $value Value to set
     */
    public function __set($key, $value)
    {
        $this->options[$key] = $value;
    }

}
?>