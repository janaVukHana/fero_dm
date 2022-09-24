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

// PAGINATION WORK IN PROGRESS...
$item_start_from = '0';
$items_per_page = '1';
// GET TOTAL NUMBER OF ACTION ITEMS IN DATABASE
echo 'Num 0f items: ' . $total_num_of_items = Action::get_num_of_items() . '<br>';
// TOTAL PAGINATION PAGES
echo 'Num of pages: ' . $num_of_pages = ceil($total_num_of_items / $items_per_page) . '<br>';
// DETERMINE CURRENT PAGE
if(!isset($_GET['page'])) {
    $current_page = 1;
} else {
    $current_page = $_GET['page'];
    $item_start_from = ($current_page - 1) * $items_per_page;
}

// probaj da dohvatis iteme is database-a
$action_items = Action::get_all_action_items($item_start_from, $items_per_page);


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