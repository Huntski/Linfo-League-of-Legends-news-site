<?php

require "../private/models/model.php";

class EventsController {
    function loadPage() {

        $event = new events;

        require "../private/models/model.php";

        $model = new model;

        require "../private/views/engine.php";

        $template_engine = new template_engine;

        $template_engine->render("eventb");
    }
}