<?php

/*
    Giang Nguyen
    Date: 06/03/2023
    File name: Applicant_SubscribedToLists.php
    Class Applicant_SubscribedToLists for job application
*/

namespace App\Classes;

use App\Classes\Applicant;

class Applicant_SubscribedToLists extends Applicant
{
    // Properties
    private array $_selectionsJobs = [];
    private array $_selectionsVerticals = [];

    // Constructor
    public function __construct($fname = '', $lname = '', $email = '', $state = '', $phone = '')
    {
        parent::__construct($fname, $lname, $email, $state, $phone);
    }

    // Getters
    public function getSelectionsJobs(): array
    {
        return $this->_selectionsJobs;
    }

    public function getSelectionsVerticals(): array
    {
        return $this->_selectionsVerticals;
    }

    // Setters
    public function setSelectionsJobs($selectionsJobs): void
    {
        $this->_selectionsJobs = $selectionsJobs;
    }

    public function setSelectionsVerticals($selectionsVerticals): void
    {
        $this->_selectionsVerticals = $selectionsVerticals;
    }

    // Convert array Selections Jobs and Selections Verticals to string
    public function textJobsAndVerticals(): string
    {
        $str = implode(', ', $this->_selectionsJobs);
        $str .= ', ' . implode(', ', $this->_selectionsVerticals);
        return $str;
    }
}