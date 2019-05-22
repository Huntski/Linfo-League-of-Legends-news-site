<?php

class events {
    function getAllEvents() {
        
        require "../private/includes/functions.php";
        $db = dbConnect();

        $sql = "SELECT * FROM linfo_events";
        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            return "something not ok";
        }
        return $sm->fetchAll(\PDO::FETCH_ASSOC);
    }


    function getEvent($id = null) {

        require "../private/includes/functions.php";
        $db = dbConnect();

        $sql = "SELECT * FROM linfo_events";
        $sm = $db->prepare($sql);
        if (!$sm->execute()) {
            return "something not ok";
        }
        
        return $sm->fetchAll(\PDO::FETCH_ASSOC);
    }
}