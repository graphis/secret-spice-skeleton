<?php defined('APP') OR die('No direct access');


/**
 * Demo stuff begins here
 */

define( 'DEBUG', TRUE );

use Application\Debug;

$debug = new Debug();

$debug->printR('hello world');



$name = 'sarfraz';
$fruits = array("banana", "apple", "strawberry", "pineaple");

$user = new stdClass;
$user->name = "Sarfraz";
$user->desig = "Sr. Software Engineer";
$user->lang = "PHP";



$debug->printR($user);



// $debug->logConsole('$name var', $user->name, true);
// $debug->logConsole('An array of fruits', $fruits, true);
// $debug->logConsole('$user object', $user, true);
// $debug->logConsole('$user object', 'zorromorro is back', true);



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









