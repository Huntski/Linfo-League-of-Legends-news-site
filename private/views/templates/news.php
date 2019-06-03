<?php

// var_dump($article_list);

?>

<main>
    <input type="input" name="search" class="inp-open search-article" placeholder="Search..">
    <h3 class="article-list-filter">Most recent articles<h3>
    <div class="article-list">
        <?php
        if(!empty($article_list)) {
            foreach ($article_list as $article_info) {
                $subtitle = explode(" ", $article_info->a_par);
                count($subtitle) >= 6 ? $sub_limit = 6 : $sub_limit = count($subtitle);
                $article_par = "";
                for ($i = 0; $i < $sub_limit; $i++) {
                    $article_par .= $subtitle[$i] . " ";
                }
                echo "
                    <article>
                        <a href='article-".$article_info->a_id."'>
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
        } else {
            echo "nothing found <br>";
            // if ($debug) {
            //     echo "<pre> <br>";
            //     var_dump($article_list);
            //     echo "</pre>";
            // }
        }
        ?>
    </div>

    <div class="pagination">
        <?php
        $pages = ceil($articleCount / LIST_LIMIT);

        for ($i = 1; $i <= $pages; $i++) {
            if ($i == $page) {
                echo "<a class='onpage' href='./news-$i'>$i</a>";
            } else {
                echo "<a href='./news-$i'>$i</a>";
            }
        }

        ?>
    </div>

</main>

<script src="js/article-search.js"></script>