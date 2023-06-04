<?php

/*
    Giang Nguyen
    Date: 06/03/2023
    File name: Applicant.php
    Class Applicant for job application
*/

namespace App\Classes;

class Applicant
{
    // Properties
    private string $_fname;
    private string $_lname;
    private string $_email;
    private string $_state;
    private string $_phone;
    private string $_github;
    private string $_experience;
    private string $_relocate;
    private string $_bio;
    private string $_avatar;

    // Constructor
    public function __construct($fname = '', $lname = '', $email = '', $state = '', $phone = '')
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_state = $state;
        $this->_phone = $phone;

        $this->_github = '';
        $this->_experience = '';
        $this->_relocate = '';
        $this->_bio = '';
    }

    // Getters
    public function getFname(): string
    {
        return $this->_fname;
    }

    public function getLname(): string
    {
        return $this->_lname;
    }

    public function getEmail(): string
    {
        return $this->_email;
    }

    public function getState(): string
    {
        return $this->_state;
    }

    public function getPhone(): string
    {
        return $this->_phone;
    }

    public function getGithub(): string
    {
        return $this->_github;
    }

    public function getExperience(): string
    {
        return $this->_experience;
    }

    public function getRelocate(): string
    {
        return $this->_relocate;
    }

    public function getBio(): string
    {
        return $this->_bio;
    }

    public function getAvatar(): string
    {
        return $this->_avatar;
    }

    // Setters
    public function setFname(string $fname): void
    {
        $this->_fname = $fname;
    }

    public function setLname(string $lname): void
    {
        $this->_lname = $lname;
    }

    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    public function setState(string $state): void
    {
        $this->_state = $state;
    }

    public function setPhone(string $phone): void
    {
        $this->_phone = $phone;
    }

    public function setGithub(string $github): void
    {
        $this->_github = $github;
    }

    public function setExperience(string $experience): void
    {
        $this->_experience = $experience;
    }

    public function setRelocate(string $relocate): void
    {
        $this->_relocate = $relocate;
    }

    public function setBio(string $bio): void
    {
        $this->_bio = $bio;
    }

    public function setAvatar(string $avatar): void
    {
        $this->_avatar = $avatar;
    }

    // ------------------- Helper functions -------------------
    public function getName()
    {
        return $this->_fname . ' ' . $this->_lname;
    }
}