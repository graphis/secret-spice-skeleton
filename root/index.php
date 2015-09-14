<?php
/**
 *
 * index.php -- skeleton
 * index.php is responsible to set up application enviroment paths,
 * composer autoloader, and call bootstrap
 *
 * @package my_application
 * @version 1.0
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * @copyright 2015 Zsolt Sándor
 *
 */

/*
# htaccess
RewriteEngine On
RewriteRule ^$ index.php [QSA]
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php/$1 [QSA,L]
*/




/**
 * Relative path to the application directory.
 */
$application = '../app';

/**
 * Relative path to the framework core. For hideing ugly vendor path
 */
$system = '../system';

/**
 * Set the PHP error reporting level. If you set this in php.ini, you remove this.
 * Dev:			E_ALL | E_STRICT
 * Production:	E_ALL ^ E_NOTICE
 * PHP >= 5.3	E_ALL & ~E_DEPRECATED
 */
error_reporting(E_ALL | E_STRICT);

// Get the start time and memory for use later
defined('FUEL_START_TIME') or define('FUEL_START_TIME', microtime(true));
defined('FUEL_START_MEM') or define('FUEL_START_MEM', memory_get_usage());



/**
 * Application document root
 */
// Set the full path to the docroot
define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

// Make the application relative to the docroot, for symlink'd index.php
if ( ! is_dir($application) AND is_dir(DOCROOT.$application))
{
	$application = DOCROOT.$application;
}

// Make the system relative to the docroot, for symlink'd index.php
if ( ! is_dir($system) AND is_dir(DOCROOT.$system))
{
	$system = DOCROOT.$system;
}

// Define the absolute paths for configured directories
define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system).DIRECTORY_SEPARATOR);

// Clean up the configuration vars
unset($application, $system);



// Kickstart the framework
require SYSPATH.'vendor/autoload.php';




define( 'DEBUG', 'TRUE' );

use Application\Debug;

$debug = new Debug();

$name = 'sarfraz';
$fruits = array("banana", "apple", "strawberry", "pineaple");

$user = new stdClass;
$user->name = "Sarfraz";
$user->desig = "Sr. Software Engineer";
$user->lang = "PHP";

$debug->logConsole('$name var', $user->name, true);
$debug->logConsole('An array of fruits', $fruits, true);
$debug->logConsole('$user object', $user, true);

$debug->logConsole('$user object', 'zorromorro is back', true);



/*

use League\Url\Url;

$url = Url::createFromUrl(
    'http://user:pass@www.example.com:81/path/index.php?query=toto+le+heros#top'
);

//let's update the Query String
$query = $url->getQuery();
$query->modify(array('query' => "lulu l'allumeuse", "foo" => "bar")); 
$query['sarah'] = "o connors"; //adding a new parameter

$url->setScheme('ftp'); //change the URLs scheme
$url->setFragment(null); //remove the fragment
$url->setPort(21);
$url->getPath()->remove('path/index.php'); //remove part of the path
$url->getPath()->prepend('mongo db'); //prepend the path
echo $url, PHP_EOL; 
// output ftp://user:pass@www.example.com:21/mongo%20db?query=lulu%20l%27allumeuse&foo=bar&sarah=o%20connors

*/



			
		echo 'time    : '.round(microtime(true)-FUEL_START_TIME, 4).'<br/>';
		echo 'mem     : '.round((memory_get_usage()-FUEL_START_MEM)/1024/1024, 4).'<br/>';
		echo 'mem peak: '.round((memory_get_peak_usage()-FUEL_START_MEM)/1024/1024, 4).'<br/>';	


