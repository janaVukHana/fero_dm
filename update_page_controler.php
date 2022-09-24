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
    // input validation
    require_once __DIR__ . '/models/validate_input.php';

    // category 
    $category = $_POST['category'];

    $is_errors = count($systemErrors) > 0 ? true : false;
    if(!$is_errors) {
        // now you can UPDATE action in database, and then relocate to action page
        
        if(Action::update_action($id, $title, $description, $category)) {
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