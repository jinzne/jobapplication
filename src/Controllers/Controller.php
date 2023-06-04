<?php

/*
    Giang Nguyen
    Date: 06/03/2023
    File name: Controller.php
    Controller for job application
*/

namespace App\Controllers;

use F3;
use Base;
use Template;

use App\Models\Model;
use App\Classes\Applicant;
use App\Classes\Applicant_SubscribedToLists;

class Controller
{
    private $_f3;
    private $_errors = [], $_flag = true;
    private bool $isMethodPOST = false;
    private Model $model;

    public function __construct($f3)
    {
        $this->_f3 = $f3;
        $this->model = new Model();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->isMethodPOST = true;
        }

        // Set default values
        if (!$this->_f3->exists('Errors')) {
            $this->_f3->set('Errors', '');
        }

        if (!$this->exists('sign_up_mailing_lists')) {
            $this->set('sign_up_mailing_lists', false);
        }

        if (!$this->exists('applicant')) {
            $this->set('applicant', new Applicant());
        }

        if (!$this->_f3->exists('sign_up_mailing_lists')) {
            $this->_f3->set('sign_up_mailing_lists', $this->get('sign_up_mailing_lists'));
        }

        if (!$this->_f3->exists('applicant')) {
            $this->_f3->set('applicant', $this->get('applicant'));
        }
    }

    // Default route. Displays home page
    public function home()
    {
        $view = new Template();
        echo $view->render('./views/home.html');
    }

    // Route to /personal-info
    public function personalInfo()
    {
        // Handle form data if it has been submitted
        if ($this->isMethodPOST) {
            // Get the data from the POST array
            $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
            $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
            $state = isset($_POST['state']) ? $_POST['state'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            $sign_up_mailing_lists = isset($_POST['sign-up-mailing-lists']) ? true : false;

            $avatar = isset($_FILES['avatar']) ? $_FILES['avatar'] : null;

            // Validate the data
            if (!$this->model->validName($fname)) {
                $this->_errors[] = "Please enter a valid first name.";
                $this->_flag = false;
            }
            if (!$this->model->validName($lname)) {
                $this->_errors[] = "Please enter a valid last name.";
                $this->_flag = false;
            }
            if (!$this->model->validEmail($email)) {
                $this->_errors[] = "Please enter a valid email.";
                $this->_flag = false;
            }
            if (!$this->model->validPhone($phone)) {
                $this->_errors[] = "Please enter a valid phone number.";
                $this->_flag = false;
            }
            if ($avatar != null && !$this->model->validImage($avatar["name"])) {
                $this->_errors[] = "Please enter a valid image.";
                $this->_flag = false;
            }

            if ($avatar != null) {
                // upload image to folder images/Uploads
                $target_dir = "images/Uploads/";
                $target_file = $target_dir . time() . basename($avatar["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                $check = getimagesize($avatar["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                }
                else {
                    $this->_errors[] = "File is not an image.";
                    $uploadOk = 0;
                }

                // Move uploaded file to target directory
                if ($uploadOk == 1) {
                    if (!move_uploaded_file($avatar["tmp_name"], $target_file)) {
                        $this->_errors[] = "Sorry, there was an error uploading your file.";
                    }
                }
            }

            // If data is valid -> store in session
            if ($this->_flag) {
                $applicant = null;
                if ($sign_up_mailing_lists) {
                    $applicant = new Applicant_SubscribedToLists($fname, $lname, $email, $state, $phone);
                }
                else {
                    $applicant = new Applicant($fname, $lname, $email, $state, $phone);
                }

                if ($avatar != null) {
                    $applicant->setAvatar($target_file);
                }

                // Store the data in the session
                $this->set('applicant', $applicant);
                $this->set('sign_up_mailing_lists', $sign_up_mailing_lists);

                // Redirect to /experience
                $this->_f3->reroute('/experience');
            }
            else {
                $textErrors = implode("\n", $this->_errors);
                $this->_f3->set('Errors', $textErrors);
            }
        }

        $view = new Template();
        echo $view->render('./views/personal-info.html');
    }

    // Route to /experience
    public function experience()
    {
        // Handle form data if it has been submitted
        if ($this->isMethodPOST) {
            // Get the data from the POST array
            $experience = isset($_POST['experience']) ? $_POST['experience'] : '';
            $bio = isset($_POST['bio']) ? $_POST['bio'] : '';
            $relocate = isset($_POST['relocate']) ? $_POST['relocate'] : '';
            $github = isset($_POST['github']) ? $_POST['github'] : '';

            // Validate the data
            if (!$this->model->validExperience($experience)) {
                $this->_errors[] = "Please enter a valid experience.";
                $this->_flag = false;
            }
            if (!$this->model->validGithub($github)) {
                $this->_errors[] = "Please enter a valid github.";
                $this->_flag = false;
            }

            // If data is valid -> store in session
            if ($this->_flag) {
                // Store the data in the session
                $applicant = $this->get('applicant');
                $applicant->setExperience($experience);
                $applicant->setBio($bio);
                $applicant->setRelocate($relocate);
                $applicant->setGithub($github);

                $this->set('applicant', $applicant);

                // Redirect to /job-mailing-lists
                if ($this->get('sign_up_mailing_lists')) {
                    $this->_f3->reroute('/job-mailing-lists');
                }
                else {
                    $this->_f3->reroute('/summary');
                }
            }
            else {
                $textErrors = implode("\n", $this->_errors);
                $this->_f3->set('Errors', $textErrors);
            }
        }

        $view = new Template();
        echo $view->render('./views/experience.html');
    }

    // Route to /job-mailing-lists
    public function job_mailing_lists()
    {
        // Handle form data if it has been submitted
        if ($this->isMethodPOST) {
            // Get the data from the POST array
            $check_jobs = isset($_POST['check-jobs']) ? $_POST['check-jobs'] : array();
            $check_verticals = isset($_POST['check-verticals']) ? $_POST['check-verticals'] : array();

            if (count($check_jobs) == 0 && count($check_verticals) == 0) {
                $this->_errors[] = "Please select at least one job or vertical.";
                $this->_flag = false;
            }

            // Validate the data
            foreach ($check_jobs as $job) {
                if (!$this->model->validSelectionsJobs($job)) {
                    $this->_errors[] = "Please enter a valid job.";
                    $this->_flag = false;
                    break;
                }
            }
            foreach ($check_verticals as $vertical) {
                if (!$this->model->validSelectionsVerticals($vertical)) {
                    $this->_errors[] = "Please enter a valid vertical.";
                    $this->_flag = false;
                    break;
                }
            }

            // If data is valid -> store in session
            if ($this->_flag) {
                // Store the data in the session
                $applicant = $this->get('applicant');
                $applicant->setSelectionsJobs($check_jobs);
                $applicant->setSelectionsVerticals($check_verticals);

                $this->set('applicant', $applicant);

                // Redirect to summary route
                $this->_f3->reroute('/summary');
            }
            else {
                $textErrors = implode("\n", $this->_errors);
                $this->_f3->set('Errors', $textErrors);
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('./views/job-mailing-lists.html');
    }

    // Route to /summary
    public function summary()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('./views/summary.html');
    }

    // ------------------- Helper Functions ------------------- //

    // Get data from SESSION
    public function get($key)
    {
        return $_SESSION[$key] ? $_SESSION[$key] : null;
    }

    // Set data in SESSION
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    // Check if SESSION has data
    public function exists($key)
    {
        return isset($_SESSION[$key]);
    }

    // Clear SESSION
    public function clearSession()
    {
        session_destroy();
        $this->_f3->reroute('/');
    }
}
