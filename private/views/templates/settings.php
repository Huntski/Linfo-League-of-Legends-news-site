<?php
// var_dump($user_info);
?>
<main class="flex">
    <form action="./settings" method="post" enctype="multipart/form-data" class="form-default">
        <p>Changing your password or email is <br>temporarly not allowed due to security not correctly implomented.</p><br>
        <div class='avatar'>
            <img src='img/avatar/<?= $user_info->user_avatar ?>'></img>
        </div>
        <input type="file" name="avatar_img" style="margin: 0; padding: 10px 0;">
        <h2>username</h2>
        <input class="inp-open" name="usern" type="text" placeholder="New username.." autocomplete="off" autofocus>
        <!-- <h2>new password</h2>
        <input class="inp-open" name="passw" type="password" placeholder="password..">
        <input class="inp-open" name="r-passw" type="password" placeholder="repeat password..">
        <br>
        <input class="inp-open" name="validate" type="password" placeholder="current password.."> -->
        <input class="btn-active" name="submit" type="submit" value="update settings">
        <p><a href="./logout">logout</a></p>
    </form>
</main>