<main class="flex">
    <form method="post" action="./login" class="form-default">
        <input name="email" type="email" class="inp-open" placeholder="Email..">
        <input type="password" name="passw" autocomplete="on" class="inp-open" placeholder="Password..">
        <input type="submit" class="btn-active" value="login">
        <p>Don't have a account? <br>Register<a href="./register" style="color: #ffc45f"> here</a></p>
        <?php
            if ($data[1]) {
                echo "<br><p style='color: #f7a71f'>login failed</p>";
            }
        ?>
    </form>
    <div class="active-msg">
        <h1>Welcome to Linfo</h1>
        <h2>Login to Linfo to unlock all content and premium features like articles and events that Linfo has to over.</h2>
    </div>
    <div class="bg-full">
        <img src="img/cheer.jpg" alt=" ">
    </div>
</main>