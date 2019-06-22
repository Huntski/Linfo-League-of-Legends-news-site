<?php

var_dump($errors);

$router = new router;

$filters = ['LCS', 'LEC', 'MSI', 'LCI', 'WORLD'];
$teams = ['TSM', 'CLG', 'C9', 'LG', 'SPLYCE', 'ROGUE', 'MG', 'FNC', 'ORG', 'VIT', 'SK', 'SKT1', 'TL', 'FOX'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>linfo · cms</title>
    <link rel="stylesheet" href="<?= $router->getCoreUrl()?>css/cms.css">
    <link rel="icon" href="<?= $router->getCoreUrl()?>img/linfo-logo.png">
</head>
<body class="preload">

    <main>
        <div class="article_list_container"></div>

        <div class="event_list_container"></div>

        <form action="<?php $router->getCoreUrl() ?>admin" method="post" enctype="multipart/form-data" class="add_article cms_form">
            <h1>Create Article</h1>
            <?php
                $title = '';
                $author = '';
                $file = '';
                $par = '';
            ?>
            <input type="text" name="title" placeholder="Title.." class="inp_bottom <?php if (in_array('title', $errors)) { echo "error"; } ?>" autofocus value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
            <input type="text" name="author" placeholder="Author.." class="inp_bottom <?php if (in_array('author', $errors)) { echo "error"; }?>" value="<?php if (isset($_POST['author'])) echo $_POST['author']; ?>">
            <input type="file" name="a_img" id="a_img" class="a_img" style="display: none">
            <label for="a_img" class="upload_label">
                <div class="<?php if (in_array("img", $errors)) { echo "error"; }?>">
                    <img src="<?= $router->getCoreUrl()?>img/icon_camera.png" alt="">
                </div>
                <p class="a_img_msg <?php if (!empty($_FILES['a_img']['name'])) echo "orange";?>"><?php if (!empty($_FILES['a_img']['name'])) { echo $_FILES['a_img']['name']; } else { echo "No image selected";} ?></p>
            </label>
            <textarea name="par" cols="50" rows="10" placeholder="Article text.." class=" <?php if (in_array('author', $errors)) { echo "error"; }?>"><?= $par ?></textarea>
            <p class="error-msg"><?php if (!empty($errors[0])) echo $errors[0];?></p>
            <input type="submit" name="submit_article" value="submit" class="btn_submit">
        </form>

        <form action="<?php $router->getCoreUrl() ?>admin" method="post" enctype="multipart/form-data" class="add_event cms_form" style="display: none">
            <h1>Create Event</h1>
            <select name="blue">
                <option value="">Blue Team</option>
                <?php
                foreach ($teams as $team) : ?>
                    <option value="<?= $team ?>"><?= $team ?></option>
                <?php
                endforeach; ?>
            </select>

            <select name="orange">
                <option value="">Orange Team</option>
                <?php
                foreach ($teams as $team) : ?>
                    <option value="<?= $team ?>"><?= $team ?></option>
                <?php
                endforeach; ?>
            </select>

            <select name="filter">
                <option value="">Filter</option>
                <?php
                foreach ($filters as $filter) : ?>
                    <option value="<?= $filter ?>"><?= $filter ?></option>
                <?php
                endforeach; ?>
            </select>
            <input type="text" name="location" class="inp_bottom" placeholder="location..">
            <input type="date" name="date" class="inp_bottom">
            <input type="submit" name="submit_event" value="submit" class="btn_submit">
        </form>

        <div class="navigation">
            <a href="<?= $router->getCoreUrl() ?>"><button><img src="<?= $router->getCoreUrl()?>img/linfo-logo.png" alt="go back to main page"></button></a>
            <button class="btn_nav_article_list" style="width: 36px !important"><img src="<?=$router->getCoreUrl()?>img/article.png" alt=" "></button>
            <button class="btn_nav_event_list" style="width: 36px !important"><img src="<?= $router->getCoreUrl()?>img/agenda.png" alt=" "></button>
            <button class="btn_nav_article focus"><img src="<?= $router->getCoreUrl()?>img/add_article.png" alt=" "></button>
            <button class="btn_nav_event"><img src="<?= $router->getCoreUrl()?>img/agenda_gang.png" alt=" "></button>
        </div>
    </main>
</body>
    <script src="<?= $router->getCoreUrl()?>js/cms.js"></script>
</html>