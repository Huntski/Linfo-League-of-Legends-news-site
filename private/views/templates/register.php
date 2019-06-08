
<?php
// var_dump($empty);
?>

<main class="flex">
    <form method="post" action="./register" class="form-default">
        <input type="text" name="usern" autocomplete="off" class="inp-open <?php if (in_array("usern", $empty)) echo "error"; ?>" placeholder="Username" autofocus>
        <input type="email" name="email" class="inp-open <?php if (in_array("email", $empty)) echo "error"; ?>" placeholder="Email..">
        <input type="password" name="passw" autocomplete="on" class="inp-open <?php if (in_array("passw", $empty)) echo "error"; ?>" placeholder="Password..">
        <input type="submit" name="submit" class="btn-active" value="sign up to linfo">
        <p>Already have a account? <br>login<a href="./login" style="color: #ffc45f"> here</a></p>
    </form>
    <div class="active-msg">
        <h1>Sign up to Linfo</h1>
        <h2>Linfo is a league of legends news site sharing everyday news about in game updates and lcs matches.<br><br>
        All articles content on this site is strict to users, so by registering to linfo you will unlock all content for free.</h2>
    </div>
    <div class="bg-full">
        <img src="img/cheer.jpg" alt=" ">
    </div>
</main>