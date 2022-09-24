<?php
session_start();

require_once __DIR__ . '/models/DB.php';
require_once __DIR__ . '/models/Action.php';
require_once __DIR__ . '/models/test_input.php';

$page = 'Create action page';

$systemErrors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // UPLOAD: file
    $allower_ext = ['png', 'jpg', 'jpeg', 'gif'];

    if(!empty($_FILES['upload']['name'])) {
        $file_name = $_FILES['upload']['name'];
        $file_size = $_FILES['upload']['size'];
        $file_tmp = $_FILES['upload']['tmp_name'];

        $target_dir = "public/theme/img/{$file_name}";
        // da bi radilo, tj. valjda file permissions su falili. 
        //Resenje: u terminalu sam otvorio fero_dm folder.
        // Komanda: chmod -R 777 public/theme/img

        // get file extension 
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
        
        if(in_array($file_ext, $allower_ext)) {
            if($file_size <= 1000000) {
                if(empty($systemErrors)) {
                    move_uploaded_file($file_tmp, $target_dir);
                    echo 'File uploaded to public/theme/img - VALID' . '<br>';
                }
            } else {
                $systemErrors['file_err'] = '* File is too large.';
                echo 'Too large file' . '<br>';
            }
        } else {
            $systemErrors['file_err'] = '* Invalid file type.';
            echo 'Invalid file' . '<br>';

        }
    } else {
        $systemErrors['file_err'] = '* Please choose a file.';
        echo 'You must choose file' . '<br>';
    }

    // validate inputs: title, description
    require_once __DIR__ . '/models/validate_input.php';

    // selected category 
    $category = $_POST['category'];

    $is_errors = count($systemErrors) > 0 ? true : false;

    if(!$is_errors) {
        // now you can create action in database, and then relocate to action page
        
        if(Action::create_action($target_dir, $title, $description, $category)) {
            header('Location: akcija_page_controler.php');
        } else {
            echo 'Could not connect to database';
        }
    } 
    
}



require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-create_action.php';

require __DIR__ . '/views/_layout/v-footer.php';