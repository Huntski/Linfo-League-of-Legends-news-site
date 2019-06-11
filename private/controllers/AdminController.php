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

            $template_engine->render("cms", "nohead");
        } else {

            $template_engine->render("cms_login", "nohead", $incorrect);
        }
    }
}