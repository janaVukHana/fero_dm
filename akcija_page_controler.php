<?php
session_start();

require_once __DIR__ . '/models/DB.php';
require_once __DIR__ . '/models/Action.php';

// $action_items = [];

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