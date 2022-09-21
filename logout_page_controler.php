<?php

session_start();

session_destroy();

header("Location: http://localhost/workspace/fero_dm_project/login_page_controler.php");
