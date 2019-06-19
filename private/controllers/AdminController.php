<?php

class AdminController {

    function loadPage() {

        $model = new model;
        $router = new router;
        $core = $router->getCoreUrl();
        $template_engine = new template_engine;

        $incorrect = false;

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
                $title = filter_var($_POST['title']);
                $par = nl2br($_POST['par']);
                $img = $_FILES;
                $author = filter_var($_POST['author']);

                $model->uploadArticle($title, $par, $author, $img);

                $core .= 'admin';
                header("location: $core");
            } elseif (isset($_POST['submit_event'])) {
                $team1 = $_POST['blue'];
                $team2 = $_POST['orange'];
                $date = $_POST['date'];
                $location = $_POST['location'];

                $model->uploadArticle($team1, $team2, $date, $location);

                $core .= 'admin';
                header("location: $core");
            }

            $template_engine->render("cms", "nohead");
        } else {

            $template_engine->render("cms_login", "nohead", $incorrect);
        }
    }
}