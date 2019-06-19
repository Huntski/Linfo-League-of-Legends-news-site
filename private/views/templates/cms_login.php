<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login into cms</title>
    <link rel="stylesheet" href="css/cms.css">
</head>
<body class="preload">
    <main class="vertical-center">
        <form method="post" action="./admin" class="login">
            <h1>Login to cms</h1>
            <input type="password" name="passw" placeholder="Password.." maxlength="60" autofocus autocomplete='off' spellcheck='false' autocorrect='off' class="inp_bottom">
            <input type="submit" value="login" class="btn_submit">
            <?php
                if ($incorrect) {
                    echo "<p>incorrect password</p>";
                }
            ?>
        </form>
    </main>
</body>

    <script type="text/javascript">
        let body = document.querySelector('body');
        body.classlist.remove('preload');
    </script>

</html>