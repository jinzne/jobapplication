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
include_once('./validation.php');

session_start();

//Create an F3 (Fat-Free Framework) object
$f3 = Base::instance();
//Base $f3 = new Base();

// Create a variable to store errors
$errors = array();
$flag = true;

$f3->set('SESSION.Errors', null);

if (!$f3->exists('SESSION.fname')) {
    $f3->set('SESSION.fname', '');
}
if (!$f3->exists('SESSION.lname')) {
    $f3->set('SESSION.lname', '');
}
if (!$f3->exists('SESSION.state')) {
    $f3->set('SESSION.state', '');
}
if (!$f3->exists('SESSION.email')) {
    $f3->set('SESSION.email', '');
}
if (!$f3->exists('SESSION.phone')) {
    $f3->set('SESSION.phone', '');
}
if (!$f3->exists('SESSION.mobile')) {
    $f3->set('SESSION.mobile', '');
}
if (!$f3->exists('SESSION.bio')) {
    $f3->set('SESSION.bio', null);
}
if (!$f3->exists('SESSION.experience')) {
    $f3->set('SESSION.experience', '');
}
if (!$f3->exists('SESSION.relocate')) {
    $f3->set('SESSION.relocate', '');
}
if (!$f3->exists('SESSION.github')) {
    $f3->set('SESSION.github', '');
}
if (!$f3->exists('SESSION.check_box')) {
    $f3->set('SESSION.check_box', '');
}


//Define a default route
$f3->route('GET /', function () {
    //echo '<h1>Welcome to my Diner!</h1>';

    //Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
    return;
});

//Create a route "/personal info" -> personal-info.html
$f3->route('GET|POST /personal-info', function ($f3) {

    global $errors, $flag;

    $f3->set('SESSION.fname', isset($_SESSION['fname']) ? $_SESSION['fname'] : '');
    $f3->set('SESSION.lname', isset($_SESSION['lname']) ? $_SESSION['lname'] : '');
    $f3->set('SESSION.state', isset($_SESSION['state']) ? $_SESSION['state'] : '');
    $f3->set('SESSION.email', isset($_SESSION['email']) ? $_SESSION['email'] : '');
    $f3->set('SESSION.phone', isset($_SESSION['phone']) ? $_SESSION['phone'] : '');
    $f3->set('SESSION.mobile', isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '');

    // If the form has been posted
    // "Auto-global" arrays:  $_SERVER, $_GET, $_POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
        $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
        $state = isset($_POST['state']) ? $_POST['state'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';

        // Validate the data
        if (!validName($fname)) {
            $errors[] = "Please enter a valid first name.";
            $flag = false;
        }
        if (!validName($lname)) {
            $errors[] = "Please enter a valid last name.";
            $flag = false;
        }
        if (!validEmail($email)) {
            $errors[] = "Please enter a valid email.";
            $flag = false;
        }
        if (!validPhone($phone)) {
            $errors[] = "Please enter a valid phone number.";
            $flag = false;
        }
        if (!validPhone($mobile)) {
            $errors[] = "Please enter a valid mobile number.";
            $flag = false;
        }

        // Store the data in the session array
        $f3->set('SESSION.fname', $fname);
        $f3->set('SESSION.lname', $lname);
        $f3->set('SESSION.state', $state);
        $f3->set('SESSION.email', $email);
        $f3->set('SESSION.phone', $phone);
        $f3->set('SESSION.mobile', $mobile);

        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['state'] = $state;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['mobile'] = $mobile;

        // If data not valid, display errors
        if (!$flag) {
            $textErrors = implode("\n", $errors);
            $f3->set('SESSION.Errors', $textErrors);
        } else {
            // Redirect to experience route
            $f3->reroute('experience');
        }
    }

    //Display view page
    $view = new Template();
    echo $view->render('views/personal-info.html');
});

//Create a route "/experience" -> experience.html
$f3->route('GET|POST /experience', function ($f3) {
    // echo'<h1>Breakfast Menu</h1>';

    global $errors, $flag;

    $f3->set('SESSION.experience', isset($_SESSION['experience']) ? $_SESSION['experience'] : '');
    $f3->set('SESSION.bio', isset($_SESSION['bio']) ? $_SESSION['bio'] : '');
    $f3->set('SESSION.relocate', isset($_SESSION['relocate']) ? $_SESSION['relocate'] : '');
    $f3->set('SESSION.github', isset($_SESSION['github']) ? $_SESSION['github'] : '');

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $experience = isset($_POST['experience']) ? $_POST['experience'] : '';
        $bio = isset($_POST['bio']) ? $_POST['bio'] : '';
        $relocate = isset($_POST['relocate']) ? $_POST['relocate'] : '';
        $github = isset($_POST['github']) ? $_POST['github'] : '';

        // Validate the data
        if (!validExperience($experience)) {
            $errors[] = "Please enter a valid experience.";
            $flag = false;
        }
        if (!validGithub($github)) {
            $errors[] = "Please enter a valid github.";
            $flag = false;
        }

        // Store the data in the session array
        $f3->set('SESSION.experience', $experience);
        $f3->set('SESSION.bio', $bio);
        $f3->set('SESSION.relocate', $relocate);
        $f3->set('SESSION.github', $github);

        $_SESSION['experience'] = $experience;
        $_SESSION['bio'] = $bio;
        $_SESSION['relocate'] = $relocate;
        $_SESSION['github'] = $github;

        // If data not valid, display errors
        if (!$flag) {
            $textErrors = implode("\n", $errors);
            $f3->set('SESSION.Errors', $textErrors);
        } else {
            // Redirect to summary route
            $f3->reroute('job-mailling-lists');
        }
    }

    //Display view page
    $view = new Template();
    echo $view->render('views/experience.html');
});

// Create a route "job-mailling-lists"
$f3->route('GET|POST /job-mailling-lists', function ($f3) {

    global $errors, $flag;

    $f3->set('SESSION.check_box', isset($_SESSION['check_box']) ? $_SESSION['check_box'] : '');

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $check_jobs = isset($_POST['check-jobs']) ? $_POST['check-jobs'] : array();
        $check_verticals = isset($_POST['check-verticals']) ? $_POST['check-verticals'] : array();

        // Validate the data
        foreach ($check_jobs as $job) {
            if (!validSelectionsJobs($job)) {
                $errors[] = "Please enter a valid job.";
                $flag = false;
                break;
            }
        }
        foreach ($check_verticals as $vertical) {
            if (!validSelectionsVerticals($vertical)) {
                $errors[] = "Please enter a valid vertical.";
                $flag = false;
                break;
            }
        }

        $check_box = implode(", ", $check_jobs);
        $check_box .= ", " . implode(", ", $check_verticals);
        // Store the data in the session array
        $f3->set('SESSION.check_box', $check_box);

        $_SESSION['check_box'] = $check_box;

        // Redirect to summary route
        $f3->reroute('summary');
    }
    // Display a view page
    $view = new Template();
    echo $view->render('views/job-mailling-lists.html');
});

// Create a route "/summary" -> summary.html
$f3->route('GET /summary', function ($f3) {
    // Assign values from session to variable
    $f3->set('SESSION.fname',  $_SESSION['fname']);
    $f3->set('SESSION.lname', $_SESSION['lname']);
    $f3->set('SESSION.state', $_SESSION['state']);
    $f3->set('SESSION.email', $_SESSION['email']);
    $f3->set('SESSION.phone', $_SESSION['phone']);
    $f3->set('SESSION.mobile', $_SESSION['mobile']);
    $f3->set('SESSION.experience', $_SESSION['experience']);
    $f3->set('SESSION.bio', $_SESSION['bio']);
    $f3->set('SESSION.relocate', $_SESSION['relocate']);
    $f3->set('SESSION.github', $_SESSION['github']);
    $f3->set('SESSION.check_box', $_SESSION['check_box']);

    // Display a view page
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();
