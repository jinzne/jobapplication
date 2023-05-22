<?php

// Checks to see that a string is all alphabetic
function validName(string $name): bool {
    $pattern = '/^[a-zA-Z ]+$/';
    return preg_match($pattern, $name);
}

// Checks to see that a string is URL GitHub: https://github.com/bcosca/fatfree
function validGithub(string $url): bool {
    $pattern = '/^https:\/\/github\.com\/[a-zA-Z0-9]+\/[a-zA-Z0-9]+$/';
    return preg_match($pattern, $url);
}

// Checks to see that a string is a valid “value” property.
function validExperience(string $experience): bool {
    // ['0-2', '2-4', '4+']
    if ($experience == '0-2' || $experience == '2-4' || $experience == '4+') {
        return true;
    }
    return false;
}

// Formatted phone number: 01234567890
function validPhone(string $phone): bool {
    $pattern = '/^0[0-9]{9,11}$/';
    return preg_match($pattern, $phone);
}

// Formatted email: abc@defg.xyz
function validEmail(string $email): bool {
    $pattern = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/';
    return preg_match($pattern, $email);
}

function validSelectionsJobs(string $option)
{
    $options = [
        'JavaScript',
        'HTML',
        'PHP',
        'CSS',
        'Java',
        'ReactJS',
        'Python',
        'NodeJs',
    ];
    return in_array($option, $options);
}

function validSelectionsVerticals(string $option)
{
    $options = [
        'SaaS',
        'Industrial tech',
        'Health Tech',
        'Cybersecurity',
        'Ag tech',
        'HR tech',
    ];
    return in_array($option, $options);
}