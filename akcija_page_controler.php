<?php
session_start();

require_once __DIR__ . '/models/DB.php';
require_once __DIR__ . '/models/Action.php';

if(isset($_POST['delete'])) {
    // echo 'user pressed delete';

    // delete item from database 
    $id = $_POST['id'];
    // delete image from folder
    $image_path = Action::get_image_path($id);
    unlink($image_path['file_path']);

    // delete item from database
    $delete_item = Action::delete_one_by_id($id);
    
    if($delete_item) {
        // echo 'Item deleted';
        echo '';
    } else {
        echo 'NOT deleted. Something went wrong.';
    }
} else if(isset($_POST['update'])) {
    // update item from database
    echo 'user pressed update';
    $id = $_POST['id'];
    $_SESSION['id'] = $id;
    header("Location: http://localhost/workspace/fero_dm_project/update_page_controler.php");

}

// probaj da dohvatis iteme is database-a
$action_items = Action::get_all_action_items();

// var_dump($action_items);

// if($action_items) {
//     echo 'ima action itemsa';
// } else {
//     echo 'nema action itemsa';
// }

$page = 'Action page';

require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-akcija.php';

require __DIR__ . '/views/_layout/v-footer.php';