<?php

// var_dump('ilija');

require_once __DIR__ . '/models/test_input.php';
$systemErrors = [];
$username = $email = $password = "";

if(isset($_POST['registration'])) {
    // REMINDER FOR MYSELF....
    // there is other way to check if user pressed form button
    // I has something to do with $_POST. Will check later.
    
    // HERE GOES MY VALIDATIONS PRACTICE ...............

    // INPUT USERNAME: Required + must have 2 or more chars
    if(empty($_POST['username'])) {
        $systemErrors['username_err'] = '* Username is required';
    } else {
        $username = test_input($_POST['username']);
        if(strlen($username) < 2) {
            $systemErrors['username_err'] = '* Username must have at least to chars';
        }
    }

    // INPUT EMAIL: Required. + Must contain a valid email address (with @ and .) 
    if(empty($_POST['email'])) {
        $systemErrors['email_err'] = '* Give me your email please';
    } else {
        $email = test_input($_POST['email']);
        if(!str_contains($email, '@')) {
            $systemErrors['email_err'] = '* You did not type @ in your mail address.';
        }
    }

    // PASSWORD: Required + Must be 6 to 10 characters long, 
    // have one capital letter and one number and start with letter
    if(empty($_POST['password'])) {
        $systemErrors['password_err'] = '* You need to type something';
        echo $systemErrors['password_err'];
    } else {
        $password = test_input($_POST['password']);

        // check if password is 6 to 10 chars long
        if(strlen($password) < 6 || strlen($password) > 10) {
            $systemErrors['password_err'] = "* Password must have 6 to 10 characters.";
            echo $systemErrors['password_err'];
        }
        // check if password start with letter
        else if(!ctype_alpha($password[0])) {
            $systemErrors['password_err'] = "* Password must start with letter.";
            echo $systemErrors['password_err'];
        }
        // check if there is capital letter in password
        else if(!preg_match('/[A-Z]/', $password)){
            $systemErrors['password_err'] = "* One capital letter is required.";
            echo $systemErrors['password_err'];
        } 
        // check if there is number in password
        else if (!preg_match('~[0-9]+~', $password)) {
            $systemErrors['password_err'] = "* Number is required.";
            echo $systemErrors['password_err'];
        }
    }
}

require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-registration.php';

require __DIR__ . '/views/_layout/v-footer.php';