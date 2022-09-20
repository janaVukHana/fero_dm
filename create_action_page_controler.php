<?php
session_start();

// require_once __DIR__ . '/models/DB.php';
// require_once __DIR__ . '/models/Users.php';
require_once __DIR__ . '/models/test_input.php';

$page = 'Create action page';

if(isset($_POST['create_action'])) {
    
}

require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-create_action.php';

require __DIR__ . '/views/_layout/v-footer.php';