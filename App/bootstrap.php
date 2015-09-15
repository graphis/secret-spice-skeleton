<?php defined('APP') OR die('No direct access');


/**
 * Demo stuff begins here
 */

define( 'DEBUG', TRUE );


// debug
use Application\Debug;
use Application\File;


$debug = new Debug();


// data to debug
$fruits = array("banana", "apple", "strawberry", "pineaple");
$user = new stdClass;
$user->Greetings = "Hello World";
$user->fruits = $fruits;
$user->name = "Mikkamakka";

// print data
$debug->printR($user);


$file = new File();

//
$file->load(APPPATH . 'configuration/app.php');


$debug->printR($config);
// $debug->printR($config);

// $debug->logConsole('$name var', $user->name, true);
// $debug->logConsole('An array of fruits', $fruits, true);
// $debug->logConsole('$user object', $user, true);
// $debug->logConsole('$user object', 'zorromorro is back', true);






