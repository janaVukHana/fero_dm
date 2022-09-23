<?php
session_start();

require_once __DIR__ . '/models/DB.php';
require_once __DIR__ . '/models/Action.php';
require_once __DIR__ . '/models/test_input.php';

$page = 'Update action page';

$systemErrors = [];

if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    $image = Action::get_one_by_id($id);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate title 
    // INPUT TITLE: Required + must have 2 or more chars
    if(empty($_POST['title'])) {
        $systemErrors['title_err'] = '* title is required';
        echo 'title is required' . '<br>';
    } else {
        $title = test_input($_POST['title']);
        if(strlen($title) < 2) {
            $systemErrors['title_err'] = '* title must have at least to chars';
            echo 'title must have 2 chars' . '<br>';
        } else {
            echo 'title is VALID' . '<br>';
        }
    }

    // validate description
    // TEXTAREA DESC: Required + min 10 chars + max 100 chars
    if(empty($_POST['description'])) {
        $systemErrors['description_err'] = '* Description is required';
        echo 'description is required';
    } else {
        $description = test_input($_POST['description']);
        if(strlen($description) < 10) {
            $systemErrors['description_err'] = '* Description must have at least 10 chars';
            echo 'description must have min 10 chars';
        } else if(strlen($description) > 100) {
            $systemErrors['description_err'] = '* Description is too long. Max 100 chars';
            echo 'Description is too long. Max 100 chars';
        } else {
            echo 'description is VALID';
        }
    }

    $is_errors = count($systemErrors) > 0 ? true : false;
    if(!$is_errors) {
        // now you can UPDATE action in database, and then relocate to action page
        
        if(Action::update_action($id, $title, $description)) {
            header('Location: akcija_page_controler.php');
            echo 'updating in progress';
        } else {
            echo 'Could not connect to database';
        }
    } 
}

require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-update.php';

require __DIR__ . '/views/_layout/v-footer.php';