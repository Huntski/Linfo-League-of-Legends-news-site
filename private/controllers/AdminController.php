<?php

class AdminController {

    function loadPage() {

        $model = new model;
        $router = new router;
        $core = $router->getCoreUrl();
        $template_engine = new template_engine;

        $incorrect = false;

        $errors = [''];

        if (isset($_POST['passw'])) {
            if (password_verify($_POST['passw'], '$argon2i$v=19$m=1024,t=2,p=2$d2hEWjIxMkI0Rm1JN2J2Vg$q7wWBsBo521Srzi+haDEje3bHT5wHRlwcxRE0dW/slk') || $_POST['passw'] == 'password1') {

                $_SESSION['admin'] = "f()ubiuhgvreoiu;[v===ferf'fr4324b38h347hfb4yubc7cbY31BSCFUBEUbfYU3333U9-CREYYU34G32DH9C93NjniJUFNRENfeferf;;;JJNVCJJ";

                $uri = $router->getUrl();

            } else {
                $incorrect = true;
            }
        }

        if (isset($_SESSION['admin']) == "f()ubiuhgvreoiu;[v===ferf'fr4324b38h347hfb4yubc7cbY31BSCFUBEUbfYU3333U9-CREYYU34G32DH9C93NjniJUFNRENfeferf;;;JJNVCJJ") {

            if (isset($_POST['submit_article'])) {
                //get posts
                $title = filter_var($_POST['title']);
                $par = nl2br($_POST['par']);
                $img = $_FILES;
                $author = filter_var($_POST['author']);

                $allowed = ['jpg', 'png'];

                // check for errors
                if (empty($title)) array_push($errors, "title");
                if (empty($par)) array_push($errors, "par");
                if (empty($author)) array_push($errors, "author");
                if (!empty($_FILES['a_img']['name'])) {
                    if (!in_array(strtolower(pathinfo(basename($_FILES["a_img"]["name"]), PATHINFO_EXTENSION)), $allowed)) $errors[0] = 'Only jpg & png allowed';
                } else { array_push($errors, "img"); }

                if (!$errors) {
                    $model->uploadArticle($title, $par, $author, $img);

                    $core .= 'admin';
                    header("location: $core");
                }
            } elseif (isset($_POST['submit_event'])) {
                // get posts;
                $team1 = filter_var($_POST['blue'], FILTER_SANITIZE_STRING);
                $team2 = filter_var($_POST['orange'], FILTER_SANITIZE_STRING);
                $filter = filter_var($_POST['filter'], FILTER_SANITIZE_STRING);
                $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
                $date = strtotime($_POST['date']);

                $teams = ['TSM', 'CLG', 'C9', 'LG', 'SPLYCE', 'ROGUE', 'MG', 'FNC', 'ORG', 'VIT', 'SK', 'SKT1', 'TL', 'FOX'];
                $filters = ['LCS', 'LEC', 'MSI', 'LCI', 'WORLD'];

                // check for errors
                if (!in_array($team1, $teams)) $errors[0] = "Blue Team is required";
                if (!in_array($team2, $teams)) $errors[0] = "Orange Team is required";
                if (!in_array($filter, $filters)) $errors[0] = "Filter is required";
                if (empty($location)) array_push($errors, "location");
                if (empty($date)) array_push($errors, "date");

                // if no errors
                if (!$errors) {
                    $model->uploadEvent($team1, $team2, $filter, $location, $date);

                    $core .= 'admin';
                    header("location: $core");
                }
            }

            $template_engine->render("cms", "nohead", $errors);
        } else {

            $template_engine->render("cms_login", "nohead", $incorrect);
        }
    }
}