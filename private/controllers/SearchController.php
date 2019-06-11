<?php

class SearchController {
    function loadPage($query = '') {
        $model = new model;

        $result = $model->searchArticle($query);

        echo json_encode($result);
    }
}