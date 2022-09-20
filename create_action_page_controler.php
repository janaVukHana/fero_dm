<?php
session_start();

$page = 'Create action page';

require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-create_action.php';

require __DIR__ . '/views/_layout/v-footer.php';