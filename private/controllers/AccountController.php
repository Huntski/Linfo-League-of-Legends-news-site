<?php

class AccountController {
    function loadPage() {

        $model = new model;

        $user_info = $model->getUserInformation($_SESSION['userid'], "id");

        if (!$user_info) {
            echo "no user found";
            die();
        }

        $saves = $model->getUserSaves($_SESSION['userid']);

        $article_list = $model->getArticlesThroughSaves($saves);

        $template_engine = new template_engine;

        $template_engine->render("account", $user_info, $article_list);
    }
}