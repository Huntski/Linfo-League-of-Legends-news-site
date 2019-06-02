<?php

$router = new router;

$routes = $router->getRoutes();

$model = new model;

if (isset($_SESSION['userid'])) $user_info = $model->getUserInformation($_SESSION['userid']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>linfo</title>
    <link rel="icon" href="img/linfo-logo.png">
    <?php
        echo '<link rel="stylesheet" href="css/style.css">';
    ?>
</head>
<body class="preload">
    <header>
        <div class="mobile">
            <div class="menu-icon">
                <img src="img/menu-icon.png" alt="">
            </div>

            <div class="logo">
                <a href="./"><img src="img/linfo-logo.png" alt="linfo"></a>
            </div>

            <div class="header-dropdown">
                <div>
                    <a href="./"><img src="img/linfo-logo.png" alt="linfo"></a>
                </div>

                <?php
                    if (isset($user_info)) {
                        echo "
                        <a href='./settings'>
                        <div class='avatar'>
                            <img src='img/".$user_info->user_avatar."'></img>
                        </div>
                        </a>";
                    } else {
                        echo "<a href='". $router->getCoreUrl() . "login" ."'><button class=\"btn-active login\">login</button></a>";
                    }
                ?>

                <nav>
                    <ul>
                        <li><a href="home" class="<?php if ($routes[0] == "home") { echo "onpage"; } ?>">home</a></li>
                        <li><a href="players" class="<?php if ($routes[0] == "players") { echo "onpage"; } ?>">players</a></li>
                        <li><a href="news" class="<?php if ($routes[0] == "news") { echo "onpage"; } ?>">news</a></li>
                        <li><a href="events" class="<?php if ($routes[0] == "events") { echo "onpage"; } ?>">events</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="desktop">
            <div class="logo">
                <a href="./"><img src="img/linfo-logo.png" alt="linfo"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="home" class="<?php if ($routes[0] == "home") { echo "onpage"; } ?>">home</a></li>
                    <li><a href="players" class="<?php if ($routes[0] == "players") { echo "onpage"; } ?>">players</a></li>
                    <li><a href="news" class="<?php if ($routes[0] == "news") { echo "onpage"; } ?>">news</a></li>
                    <li><a href="events" class="<?php if ($routes[0] == "events") { echo "onpage"; } ?>">events</a></li>
                </ul>
            </nav>

            <?php
            if (isset($user_info)) {
                echo "
                <a href='./settings'>
                <div class='avatar'>
                    <img src='img/".$user_info->user_avatar."'></img>
                </div>
                </a>";
            } else {
                echo "<a href='". $router->getCoreUrl() . "login" ."'><button class=\"btn-active login\">login</button></a>";
            }
            ?>
        </div>
    </header>
