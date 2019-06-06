<?php

class EventsController {
    function loadPage() {;

        $model = new model;

        $event_list = $model->getAllEvents();

        // var_dump($event_list);

        $template_engine = new template_engine;

        $template_engine->render("events", $event_list);
    }
}