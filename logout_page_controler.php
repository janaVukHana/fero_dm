<?php

session_start();

session_destroy();

header("Location: http://localhost/workspace/fero_dm/login_page_controler.php");
