<?php

class AdminController {

    function loadPage() {
        if (isset($_SESSION['admin']) == "iubiuhgvreoiuvb38h347hfb4yubc7cbYBSCFUBEUbfYU3333U9-CREYYU34G32DH9C93NjniJUFNRENJJNVCJJ") {
            include "../private/views/templates/cms.php";
        } else {
            include "../private/views/templates/cms_login.php";
        }
    }
}