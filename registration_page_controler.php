<?php

$systemErrors = [];
$username = $email = $password = "";

if(isset($_POST['registration'])) {
    echo 'user pressed registration button';
}

require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-registration.php';

require __DIR__ . '/views/_layout/v-footer.php';