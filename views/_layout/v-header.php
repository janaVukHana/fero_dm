<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="keywords" content="Gvozdjara Fero D&M, Novi Sad">
    <meta name="description" content="Gvozdjara, Novi Sad">
    <meta name="author" content="Radovanović Ilija">

    <title>Fero D&M</title>

    <!-- favicon -->
    <!-- <link rel="icon" href="./img/favicon(3).ico"> -->

    <!-- Font Awesome -->
    <script defer="" src="https://use.fontawesome.com/releases/v6.2.0/js/all.js"></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="./public/theme/css/reset.css">
    <link rel="stylesheet" href="./public/theme/css/styles.css">
    
</head>
<body>
    <div class="container">

        <header>
            <!-- navigation -->
            <nav>

                <div class="logo">
                    <h1><a href="home_page_controler.php">Fero D&M<br /><span>Gvozdjara</span></a></h1>
                </div>
    
                <div class="navbar">
                    <ul class="navbar-menu">
                        <li><a class="<?php if($page == 'Home page') echo htmlspecialchars('active'); ?>" href="home_page_controler.php">Pocetna</a></li>
                        <li><a class="<?php if($page == 'Asortiman page') echo htmlspecialchars('active'); ?>" href="asortiman_page_controler.php">Asortiman</a></li>
                        <li><a class="<?php if($page == 'Action page') echo htmlspecialchars('active') ?>" href="akcija_page_controler.php">Akcija</a></li>
                        <li><a href="#">Projekti</a></li>
                        <li><a href="#">O Nama</a></li>
                        <li><a class="<?php if($page == 'Kontakt page') echo htmlspecialchars('active'); ?>" href="kontakt_page_controler.php">Kontakt</a></li>
                        <?php if(isset($_SESSION['admin'])) { ?>
                            <li><a class="<?php if($page == 'Create action page') echo htmlspecialchars('active'); ?>" href="create_action_page_controler.php"><?php if(isset($_SESSION['admin'])) echo htmlspecialchars('Create action'); ?></a></li>
                            <li><a href="logout_page_controler.php">Logout</a></li>
                        <?php } ?>
                        <?php if(!isset($_SESSION['admin'])) { ?>
                            <li><a class="<?php if($page == 'Login page') echo htmlspecialchars('active'); ?>" href="login_page_controler.php">Log In</a></li>
                        <?php } ?>
                    </ul> 
                </div>

                <button class="mobile-menu-icon">
                    <div class="line line-top"></div>
                    <div class="line line-middle"></div>
                    <div class="line line-bottom"></div>
                </button>

            </nav>
        </header>

        <main>