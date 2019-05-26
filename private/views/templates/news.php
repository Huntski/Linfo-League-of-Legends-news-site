<?php

include "header.php";

?>

<main>
    <input type="text" class="inp-open search-article" placeholder="Search..">
    <div class="article-list">
        <?php
        foreach ($allArticles_info as $article_info) {
            $subtitle = explode(" ", $article_info->a_par);
            count($subtitle) >= 6 ? $sub_limit = 6 : $sub_limit = count($subtitle);
            $article_par = "";
            for ($i = 0; $i < $sub_limit; $i++) {
                $article_par .= $subtitle[$i] . " ";
            }
            echo "
                <article>
                    <a href='news/".$article_info->a_id."'>
                        <div>
                        <h1>".$article_info->a_title."</h1>
                        <h2>".$article_par."</h2>
                        </div>
                        <div class=\"img-background\">
                            <img src=\"img/". explode("[&&]", $article_info->a_img_links)[0] ."\" alt=\"\">
                        </div>
                    </a>
                </article>";
        }
        ?>
    </div>
</main>

<script src="js/article-search.js"></script>

<?php

include "footer.php";

?>