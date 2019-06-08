<?php

class AdminController {

    function loadPage() {

        $incorrect = false;

        if (isset($_POST['passw'])) {
            if (password_verify($_POST['passw'], '$2y$10$GANiRpRboHG2vaRCluNoC.VtiZI4foBA7EAOibwAKt3eLeBvuZUjS')) {

                $_SESSION['admin'] = "f()ubiuhgvreoiu;[v===ferf'fr4324b38h347hfb4yubc7cbY31BSCFUBEUbfYU3333U9-CREYYU34G32DH9C93NjniJUFNRENfeferf;;;JJNVCJJ";

                $router = new router;
                $uri = $router->getUrl();

            } else {
                $incorrect = true;
            }
        }

        $template_engine = new template_engine;

        if (isset($_SESSION['admin']) == "f()ubiuhgvreoiu;[v===ferf'fr4324b38h347hfb4yubc7cbY31BSCFUBEUbfYU3333U9-CREYYU34G32DH9C93NjniJUFNRENfeferf;;;JJNVCJJ") {

            $template_engine->render("cms", "nohead");
        } else {

            $template_engine->render("cms_login", "nohead", $incorrect);
        }
    }
}