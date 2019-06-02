<main>
    <form method="post" action="./register">
        <div class="logo">
            <a href="./"><img src="img/linfo-logo.png" alt="linfo"></a>
        </div>
        <input type="email" name="email" class="inp-open" placeholder="email..">
        <input type="password" name="passw" autocomplete="on" class="inp-open" placeholder="password..">
        <input type="password" name="r-passw" autocomplete="on" class="inp-open" placeholder="repeat password..">
        <input type="text" name="usern" class="inp-open" placeholder="username">
        <input type="submit" name="submit" class="btn-active" value="submit">
        <p>already have a account?<br><a href="./login" style="color: #ffc45f">login</a></p>
        <?php
            if ($data[1]) {
                echo "<br><p style='color: #f7a71f'>register failed</p>";
            }
        ?>
    </form>
</main>