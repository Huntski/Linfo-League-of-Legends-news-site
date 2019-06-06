<?php

require "../private/models/model.php";

class EventsController {
    function loadPage() {;

        $model = new model;

        $template_engine = new template_engine;

        $template_engine->render("eventb");
    }
}