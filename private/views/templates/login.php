<main>
    <form method="post" action="./login" class="form-default">
        <div class="logo">
            <a href="./"><img src="img/linfo-logo.png" alt="linfo"></a>
        </div>
        <input name="email" type="email" class="inp-open" placeholder="email..">
        <input type="password" name="passw" autocomplete="on" class="inp-open" placeholder="password..">
        <input type="submit" class="btn-active" value="submit">
        <p>don't have a account?<br><a href="./register" style="color: #ffc45f">register</a></p>
        <?php
            if ($data[1]) {
                echo "<br><p style='color: #f7a71f'>login failed</p>";
            }
        ?>
    </form>
</main>