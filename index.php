<?php
/*
 * Giang Nguyen
 * 4/22/2023
 * Sdev328/jobapplication/index/php
 * Controller for job application
 *
 */

//Turn on error reporting
ini_set('display_error',1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an F3 (Fat-Free Framework) object
$f3 = Base::instance();
//Base $f3 = new Base();

//Define a default route
$f3->route('GET /', function() {
    //echo '<h1>Welcome to my Diner!</h1>';

    //Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

//Run Fat-Free
$f3->run();