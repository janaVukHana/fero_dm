<?php
session_start();

$page = 'Kontakt page';

require __DIR__ . '/views/_layout/v-header.php';

require __DIR__ . '/views/v-kontakt.php';

require __DIR__ . '/views/_layout/v-footer.php';