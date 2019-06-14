<main class="flex">

    <div class="active-msg mobile" style="display: none;">
        <h1>Welcome back</h1>
        <h2>Login to Linfo to unlock all content and premium features like articles and events that Linfo has to over.</h2>
    </div>
    <form method="post" action="<?= $router->getCoreUrl(); ?>login" class="form-default">
        <input name="email" type="email" class="inp-open" placeholder="Email.." autofocus>
        <input type="password" name="passw" autocomplete="on" class="inp-open" placeholder="Password..">
        <input type="submit" class="btn-active" value="login">
        <p>Don't have a account? <br><a href="./register">Register <span style="color: #ffc45f">here</span></a></p>
        <?php
            if ($data[1]) {
                echo "<br><p style='color: #f7a71f'>login failed</p>";
            }
        ?>
    </form>
    <div class="active-msg">
        <h1>Welcome back</h1>
        <h2>Login to Linfo to unlock all content and premium features like articles and events that Linfo has to over.</h2>
    </div>
    <div class="bg-full">
        <img src="img/cheer.jpg" alt=" ">
    </div>
</main>