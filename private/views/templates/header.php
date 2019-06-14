<?php

$router = new router;

$routes = $router->getRoutes();

$model = new model;

if (isset($_SESSION['userid'])) {
    $user_info = $model->getUserInformation($_SESSION['userid']);

    if (!$user_info) {
        session_destroy();

        header("Refresh: 1");
    }
}


// var_dump($routes);

$page = (string)explode('-', $routes[0])[0];

$page == 'home' ? $page = '' : $page = '· '. $page;

$uri = $router->getCoreUrl();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>linfo <?= $page ?></title>
    <link rel="icon" href="img/linfo-logo.png">
    <?php
        echo '<link rel="stylesheet" href="'.$uri.'css/style.css">';
    ?>
    <script src="js/jquery-3.2.1.min.js"></script>
</head>
<body class="preload">
    <header>
        <div class="mobile">
            <div class="menu-icon">
                <img src="img/menu-icon.png" alt="">
            </div>

            <div class="header-dropdown">
                <div>
                    <a href="./"><img src="img/linfo-logo.png" alt="linfo"></a>
                </div>

                <?php
                    if (isset($user_info)) {
                        echo "
                        <a href='./user'>
                            <div class='avatar'>
                                <img src='img/avatar/".$user_info->user_avatar."'></img>
                            </div>
                        </a>";
                    } else {
                        echo "<a href='". $uri . "login" ."'><button class=\"btn-active login\">login</button></a>";
                    }
                ?>

                <nav>
                    <ul>
                        <li><a href="<?=$uri?>home" class="<?php if ($routes[0] == "home") { echo "onpage"; } ?>">home</a></li>
                        <li><a href="<?=$uri?>news" class="<?php if (strpos($routes[0], "ews") !== false) { echo "onpage"; } ?>">news</a></li>
                        <li><a href="<?=$uri?>events" class="<?php if (strpos($routes[0], "vents") !== false) { echo "onpage"; } ?>">events</a></li>
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
                    <li><a href="<?=$uri?>home" class="<?php if ($routes[0] == "home") { echo "onpage"; } ?>">home</a></li>
                    <li><a href="<?=$uri?>news" class="<?php if (strpos($routes[0], "ews") !== false) { echo "onpage"; } ?>">news</a></li>
                    <li><a href="<?=$uri?>events" class="<?php if (strpos($routes[0], "vents") !== false) { echo "onpage"; } ?>">events</a></li>
                </ul>
            </nav>

            <?php

            if (isset($user_info)) {
                echo "
                <a href='./user'>
                <div class='avatar'>
                    <img src='img/avatar/".$user_info->user_avatar."'></img>
                </div>
                </a>";
            } else {
                echo "<a href='". $uri . "login" ."'><button class=\"btn-active login\">login</button></a>";
            }
            ?>
        </div>
    </header>