<?php

class EventsController {
    function loadPage($filter = 'lcs') {

        $event_filters = array(
            'lcs',
            'lek',
            'lck',
            'msi',
            'lcl',
            'world'
        );

        if (!in_array($filter, $event_filters)) $filter = 'lcs';

        $model = new model;

        $event_list = $model->getEvents($filter);

        $template_engine = new template_engine;

        $template_engine->render("events", $event_list, $filter);
    }
}