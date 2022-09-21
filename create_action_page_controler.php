<?php
session_start();

// require_once __DIR__ . '/models/DB.php';
// require_once __DIR__ . '/models/Users.php';
require_once __DIR__ . '/models/test_input.php';

$page = 'Create action page';

$systemErrors = [];

if(isset($_POST['create_action'])) {
    // UPLOAD: file

    $allower_ext = ['png', 'jpg', 'jpeg', 'gif'];

    if(!empty($_FILES['upload']['name'])) {
        $file_name = $_FILES['upload']['name'];
        $file_size = $_FILES['upload']['size'];
        $file_tmp = $_FILES['upload']['tmp_name'];

        $target_dir = "/public/theme/img/{$file_name}";

        // get file extension
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
        
        if(in_array($file_ext, $allower_ext)) {
            if($file_size <= 1000000) {
                if(empty($systemErrors)) {
                    move_uploaded_file($file_tmp, $target_dir);
                }
            } else {
                $systemErrors['file_err'] = '* File is too large.';
            }
        } else {
            $systemErrors['file_err'] = '* Invalid file type.';
        }
    } else {
        $systemErrors['file_err'] = '* Please choose a file.';
    }
    // header('Location: home_page_controler.php');
}



require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-create_action.php';

require __DIR__ . '/views/_layout/v-footer.php';