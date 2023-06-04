<?php
/*
 * Giang Nguyen
 * 4/22/2023
 * Sdev328/jobapplication/index/php
 * Route for job application
 *
 */

namespace App;

//Turn on error reporting
ini_set('display_error', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

use F3;
use Base;
use App\Controllers\Controller;
if (!class_exists('App\Controllers\Controller')) {
    die('Class Controller not found');
}


// Start a session
session_start();

//Create an F3 (Fat-Free Framework) object
$f3 = Base::instance();

$controller = new Controller($f3);

//Define a default route
$f3->route('GET /', function ($f3) {
    global $controller;
    $controller->home();
});

$f3->route('GET|POST /personal-info', function () {
    global $controller;
    $controller->personalInfo();
});

$f3->route('GET|POST /experience', function () {
    global $controller;
    $controller->experience();
});

$f3->route('GET|POST /job-mailing-lists', function () {
    global $controller;
    $controller->job_mailing_lists();
});

$f3->route('GET /summary', function () {
    global $controller;
    $controller->summary();
});

// //Run Fat-Free
$f3->run();