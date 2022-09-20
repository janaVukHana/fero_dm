<?php
session_start();

$page = 'Asortiman page';

require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-asortiman.php';

require __DIR__ . '/views/_layout/v-footer.php';