<?php

session_start();

require_once __DIR__ . '/models/DB.php';
require_once __DIR__ . '/models/Action.php';

$items_per_page = $_SESSION['filter_items_per_page'] ?: 9;;
$filter_added = $_SESSION['filter_added'] ?: 'desc';
$filter_category = $_SESSION['filter_category'] ?: 'all';

if(!isset($_SESSION['filter_category'])) {
    $_SESSION['filter_category'] = $filter_category;
    $_SESSION['filter_added'] = $filter_added;
    $_SESSION['filter_items_per_page'] = $items_per_page;
} 

if(isset($_GET['filter'])) {
    $filter_category = $_GET['category'];
    $filter_added = $_GET['added'];
    $items_per_page = $_GET['items_per_page'];
    
    $_SESSION['filter_category'] = $filter_category;
    $_SESSION['filter_added'] = $filter_added;
    $_SESSION['filter_items_per_page'] = $items_per_page;
} 

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
// GET TOTAL NUMBER OF ACTION ITEMS IN DATABASE
if($filter_category == 'all') {
    $total_num_of_items = Action::get_num_of_items();
} else {
    $total_num_of_items = Action::get_num_of_filtered_items($filter_category);
}
// TOTAL PAGINATION PAGES
$num_of_pages = ceil($total_num_of_items / $items_per_page);

// DETERMINE CURRENT PAGE
if(!isset($_GET['page'])) {
    $current_page = 1;
} else {
    $current_page = $_GET['page'];
    $item_start_from = ($current_page - 1) * $items_per_page;
}

$_SESSION['page'] = $current_page;

// get items from database
if($filter_category == 'all') {
    $action_items = Action::get_all_action_items($item_start_from, $items_per_page, $filter_added);
} else {
    $action_items = Action::get_filtered_action_items($item_start_from, $items_per_page, $filter_added, $filter_category);
}

$page = 'Action page';

require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-akcija.php';

require __DIR__ . '/views/_layout/v-footer.php';