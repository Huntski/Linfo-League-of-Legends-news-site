<?php

class AdminController {

    function loadPage() {

        $incorrect = false;

        if (isset($_POST['passw'])) {
            if (password_verify($_POST['passw'], '$argon2i$v=19$m=1024,t=2,p=2$d2hEWjIxMkI0Rm1JN2J2Vg$q7wWBsBo521Srzi+haDEje3bHT5wHRlwcxRE0dW/slk')) {

                $_SESSION['admin'] = "f()ubiuhgvreoiu;[v===ferf'fr4324b38h347hfb4yubc7cbY31BSCFUBEUbfYU3333U9-CREYYU34G32DH9C93NjniJUFNRENfeferf;;;JJNVCJJ";

                $router = new router;
                $uri = $router->getUrl();

            } else {
                $incorrect = true;
            }
        }

        $template_engine = new template_engine;

        if (isset($_SESSION['admin']) == "f()ubiuhgvreoiu;[v===ferf'fr4324b38h347hfb4yubc7cbY31BSCFUBEUbfYU3333U9-CREYYU34G32DH9C93NjniJUFNRENfeferf;;;JJNVCJJ") {

            if (isset($_POST['submit_article'])) {
                $title = filter_var($_POST['title']);
                $par = filter_var($_POST['par']);
                $img = $_POST['img']; // does not check if img is img file
                $author = filter_var($_POST['author']);

                $model = new model;

                $model->uploadArticle($title, $par, $author, $img);
            }

            if (isset($_POST['submit_event'])) {
                $team1 = $_POST['team1'];
                $team2 = $_POST['team2'];
                $team_img = $_POST[''];
                $date = $_POST['date'];
            }

            $template_engine->render("cms", "nohead");
        } else {

            $template_engine->render("cms_login", "nohead", $incorrect);
        }
    }
}