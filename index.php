<?php
/*
 * Giang Nguyen
 * 4/22/2023
 * Sdev328/jobapplication/index/php
 * Controller for job application
 *
 */

//Turn on error reporting
ini_set('display_error', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

session_start();


//Create an F3 (Fat-Free Framework) object
$f3 = Base::instance();
//Base $f3 = new Base();

//Define a default route
$f3->route('GET /', function () {
    //echo '<h1>Welcome to my Diner!</h1>';

    //Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
    return;
});
//Define a personal information route
$f3->route('GET /personal-info', function () {
    // echo'<h1>Breakfast Menu</h1>';

    //Display view page
    $view = new Template();
    echo $view->render('views/personal-info.html');
});
// Define a mailling lists route
$f3->route('GET /job-mailling-lists', function () {

    // Display a view page
    $view = new Template();
    echo $view->render('views/job-mailling-lists.html');
});

//Create a route "/personal info" -> personal-info.html
$f3->route('GET|POST /personal-info', function ($f3) {

    // If the form has been posted
    // "Auto-global" arrays:  $_SERVER, $_GET, $_POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        // Get the data
        //var_dump($_POST);
        // $fname = $_POST['fname'];
        // $lname = $_POST['lname'];

        //echo ("Food: $food, Meal: $meal");

        // Validate the data

        // Store the data in the session array
        // $f3->set('SESSION.fname', $fname);
        // $f3->set('SESSION.lname', $lname);


        //$_SESSION['food'] = $food;

        // Redirect to experience route
        $f3->reroute('experience');
    }

    //Display view page
    $view = new Template();
    echo $view->render('views/personal-info.html');
});
//Create a route "/experience" -> experience.html
$f3->route('GET|POST /experience', function ($f3) {
    // echo'<h1>Breakfast Menu</h1>';

    // $f3->set('SESSION.fname', $_POST['fname']);

    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['mobile'] = $_POST['mobile'];

    //Display view page
    $view = new Template();

    echo $view->render('views/experience.html');
});

//Create a route "/summary" -> summary.html
$f3->route('GET /summary', function ($f3) {
    // echo'<h1>Breakfast Menu</h1>';

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //Get the data
        //["conds"]=> array(2) { [0]=> string(7) "mustard" [1]=> string(4) "mayo" }
        $conds = implode(", ", $_POST['conds']);
        //echo $conds;

        //Validate the data

        //Store the data in the session array
        $f3->set('SESSION.condiments', $conds);

        //Redirect to the summary route
        $f3->reroute('summary');
    }
    //Display view page
    $view = new Template();
    echo $view->render('views/personal-info.html');
});

// Create a route "/summary" -> summary.html
$f3->route('GET|POST /summary', function ($f3) {

    //echo '<h1>Breakfast Menu</h1>';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $_SESSION['check-box'] = $_POST['check-box'];
    }

    $check_box = implode(", ", $_SESSION['check-box']);
    $f3->set('fname', $_SESSION['fname']);
    $f3->set('lname', $_SESSION['lname']);
    $f3->set('state', $_SESSION['state']);
    $f3->set('email', $_SESSION['email']);
    $f3->set('phone', $_SESSION['phone']);
    $f3->set('mobile', $_SESSION['mobile']);
    $f3->set('bio', $_SESSION['bio']);
    $f3->set('experience', $_SESSION['experience']);
    $f3->set('relocate', $_SESSION['relocate']);
    $f3->set('github', $_SESSION['github']);
    $f3->set('check_box', $check_box);

    // Display a view page
    $view = new Template();
    echo $view->render('views/summary.html');

});

// Create a route "job-mailling-lists"
$f3->route('GET|POST /job-mailling-lists', function () {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $_SESSION['bio'] = $_POST['bio'];
        $_SESSION['experience'] = $_POST['experience'];
        $_SESSION['relocate'] = $_POST['relocate'];
        $_SESSION['github'] = $_POST['github'];
    }
    // Display a view page
    $view = new Template();
    echo $view->render('views/job-mailling-lists.html');
});

//Run Fat-Free
$f3->run();
