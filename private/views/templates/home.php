<?php
    if (!isset($allArticles)) {
        die();
    }

    $active_article = $allArticles[0];
?>

<main>
    <div class="home">
        <div class="article-active article-bg">
            <div>
                <h1><?= $active_article->a_title ?></h1>
                <h2>
                <?php
                    $subtitle = explode(" ", $active_article->a_par);
                    for ($i = 0; $i < 8; $i++) {
                        echo $subtitle[$i] . " ";
                    }
                ?>
                </h2>
                <a href="article/<?= $active_article->a_id ?>"><button class="btn-open">read more</button></a>
                <img class="img-background" src="img/<?= explode("[&&]", $active_article->a_img_links)[0]; ?>" alt="">
            </div>
        </div>

        <div class="article-list">
            <?php
            foreach ($allArticles as $article_info) {
                if ($article_info != $active_article) {
                    echo "
                        <article>
                            <div>
                            <h1>".$article_info->a_title."</h1>
                            <h2>".$article_info->a_par."</h2>
                            </div>
                            <img class=\"img-background\" src=\"img/". explode("[&&]", $article_info->a_img_links)[0] ."\" alt=\"\">
                        </article>";
                }
            }
            ?>
        </div>
    </div>
</main>