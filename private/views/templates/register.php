
<?php
// var_dump($empty);
?>

<main>
    <form method="post" action="./register" class="form-default">
        <div class="logo">
            <a href="./"><img src="img/linfo-logo.png" alt="linfo"></a>
        </div>
        <input type="email" name="email" class="inp-open <?php if (in_array("email", $empty)) echo "error"; ?>" placeholder="email..">
        <input type="password" name="passw" autocomplete="on" class="inp-open <?php if (in_array("passw", $empty)) echo "error"; ?>" placeholder="password..">
        <input type="password" name="r-passw" autocomplete="on" class="inp-open <?php if (in_array("r-passw", $empty)) echo "error"; ?>"placeholder="repeat password..">
        <input type="text" name="usern" class="inp-open <?php if (in_array("usern", $empty)) echo "error"; ?>" placeholder="username">
        <input type="submit" name="submit" class="btn-active" value="submit">
        <p>already have a account?<br><a href="./login" style="color: #ffc45f">login</a></p>
        <?php
            // if ($data[1]) {
            //     echo "<br><p style='color: #f7a71f'>register failed</p>";
            // }
        ?>
    </form>
</main>