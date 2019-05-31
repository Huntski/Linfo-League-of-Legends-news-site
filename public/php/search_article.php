<?php

if (isset($_GET['query'])) {
    $search_query = filter_var($_GET['query'], FILTER_SANITIZE_STRING);

    chdir("..");

    require "/../private/models/model.php";

    $model = new model;

    $found_articles = $model->searchArticle($search_query);

    $result = '';

    if(!empty($found_articles)) {
        foreach ($article_list as $article_info) {
            $subtitle = explode(" ", $article_info->a_par);
            count($subtitle) >= 6 ? $sub_limit = 6 : $sub_limit = count($subtitle);
            $article_par = "";
            for ($i = 0; $i < $sub_limit; $i++) {
                $article_par .= $subtitle[$i] . " ";
            }
            $result . "
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
    } else {
        echo "nothing found <br>";
    }

    echo $result;
}