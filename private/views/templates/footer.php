<footer>
    <p>© Linfo</p>
    <p>25718@ma-web.nl</p>
</footer>

</body>
    <script src="js/script.js"></script>
</html>


<?php

if (isset($_POST)) {
    if (count($_POST) > 1) {
        $uri = $router->getUrl();
        header("location: $uri");
    }
}