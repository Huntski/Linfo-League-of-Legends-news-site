<?php

// echo "test";

?>

<main>
    <div class="view-article">
        <div class="article-img">
            <img src="img/<?= $article_info->a_img_links ?>" alt=" ">
        </div>

        <div class="article-content">
            <h1><?= $article_info->a_title ?></h1>
            <p><?= $article_info->a_par ?></p>
        </div>

        <form method="post" action="./article-<?= $article_info->a_id ?>">
            <button type="submit" name="save"><img src='img/icon_save.png'> save</button>
        </form>

        <form method="post" action="./article-<?= $article_info->a_id ?>" class="form-comment">
            <div class="avatar">
                <img src="img/<?= $user_info->user_avatar ?>" alt=" ">
            </div>
            <textarea class='textarea-open' name="comment" cols="50" rows="3" maxlength="250" placeholder="comment. ."></textarea>
            <input type="submit" class="btn-active" value="comment">
        </form>

        <div class="article-comments">
            <?php

            foreach($article_comments as $comment) {
                $model = new model;

                // SRY SRY SRY !!
                // I know this code is rly badly structured BUT IT WORKS so I am not changing it..

                $comment_user = $model->getUserInformation($comment->user_id);
                echo "
                <div class='comment'>
                    <div class='user'>
                        <div class='avatar'>
                            <img src='img/".$comment_user->user_avatar."' alt=' '>
                        </div>
                        <h3>".$comment_user->user_name."</h3>
                    </div>
                    <p>".$comment->comment."</p>
                </div>
                ";
            }

            ?>
        </div>
    </div>
</main>