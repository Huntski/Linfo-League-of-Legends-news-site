<?php

    if (!count($allArticles)) array_push($allArticles, "no articles found");
    $active_article = $allArticles[0];

?>

<main>
    <div class="article-active">
        <div>
            <h1><?= $active_article->a_title ?></h1>
            <h2>
            <?php
                $subtitle = explode(" ", $active_article->a_par);
                count($subtitle) >= 7 ? $sub_limit = 7 : $sub_limit = count($subtitle);
                for ($i = 0; $i < $sub_limit; $i++) {
                    echo $subtitle[$i] . " ";
                }
            ?>
            </h2>
            <a href="article-<?= $active_article->a_id ?>"><button class="btn-open">read more</button></a>
        </div>
        <div class="img-background">
            <img src="img/<?= explode("[&&]", $active_article->a_img_links)[0]; ?>" alt="">
        </div>
    </div>

    <div class="article-list">
        <?php
        if ($allArticles) {
            foreach ($allArticles as $article_info):
                if ($article_info != $active_article) {
                    $subtitle = explode(" ", $article_info->a_par);
                    count($subtitle) >= 6 ? $sub_limit = 6 : $sub_limit = count($subtitle);
                    $article_par = "";
                    for ($i = 0; $i < $sub_limit; $i++) {
                        $article_par .= $subtitle[$i] . " ";
                    } ?>
                        <article>
                            <a href='article-<?=htmlspecialchars($article_info->a_id)?>'>
                                <div>
                                <h1><?=$article_info->a_title?></h1>
                                <h2><?=$article_par?></h2>
                                </div>
                                <div class="img-background">
                                    <img src="img/<?php echo explode(",", $article_info->a_img_links)[0] ?>" alt="lol">
                                </div>
                            </a>
                        </article> <?php
                }
            endforeach;
        } else {
            echo "no articles found";
        }
        ?>
    </div>
</main>