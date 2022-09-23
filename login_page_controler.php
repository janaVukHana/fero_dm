<?php
session_start();

require_once __DIR__ . '/models/DB.php';
require_once __DIR__ . '/models/Users.php';
require_once __DIR__ . '/models/test_input.php';

$page = 'Login page';

$systemErrors = [];
$email = $password = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate username 
    // INPUT USERNAME: Required + must have 2 or more chars
    if(empty($_POST['username'])) {
        $systemErrors['username_err'] = '* Username is required';
    } else {
        $username = test_input($_POST['username']);
        if(strlen($username) < 2) {
            $systemErrors['username_err'] = '* Username must have at least to chars';
        }
    }

    // validate password
    // PASSWORD: Required + Must be 6 to 10 characters long, 
    // have one capital letter and one number and start with letter
    if(empty($_POST['password'])) {
        $systemErrors['password_err'] = '* You need to type something';
    } else {
        $password = test_input($_POST['password']);

        // check if password is 6 to 10 chars long
        if(strlen($password) < 6 || strlen($password) > 10) {
            $systemErrors['password_err'] = "* Password must have 6 to 10 characters.";
        }
        // check if password start with letter
        else if(!ctype_alpha($password[0])) {
            $systemErrors['password_err'] = "* Password must start with letter.";
        }
        // check if there is capital letter in password
        else if(!preg_match('/[A-Z]/', $password)){
            $systemErrors['password_err'] = "* One capital letter is required.";
        } 
        // check if there is number in password
        else if (!preg_match('~[0-9]+~', $password)) {
            $systemErrors['password_err'] = "* Number is required.";
        }
    }

    $is_error = count($systemErrors) > 0 ? true : false;
    if(!$is_error) {
        // if there is no errors, check if username and password are matched in DB
       $admin = new Users();
       $admin_log = $admin->admin_login($username, $password);
       echo 'nema greske u systemErrors';
       if($admin_log) {
        echo 'admin se ulogovao';
        $_SESSION['admin'] = $username; 
        header("Location: http://localhost/workspace/fero_dm_project/create_action_page_controler.php");
       } else {
        echo 'admin se nije ulogovao';
       }
    } else {
        echo 'ima greske: systemErrors';
    }
}


//REAL COMMENT
// next four lines are when user is logged and want to change profile image
// require_once __DIR__ . '/models/handle_header_form.php';
// $header_form_err = false;
// $modal_systemErrors = [];
// handle_header_form();

// $page = 'Home page';

// REAL COMMENT
// if session is set show add court page, else show login/signup buttons
// $is_set_session = false;
// if(isset($_SESSION['username'])) {
//     $is_set_session = true;
// }

require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-login.php';

require __DIR__ . '/views/_layout/v-footer.php';