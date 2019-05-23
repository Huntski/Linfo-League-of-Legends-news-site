<?php
    $images = scandir("img/");
    $titles = array(0 => "わたし わ げい です", 1 => "あなた わ さかな お だべる", 2 => "おにーちゃん わ すごい");
    $pars = array(0 => "魚", 1 => "わたし ほしい に せんぱい お だべる", 3 => "かれ わ すごい です ね？");

    if (!isset($allArticles)) {
        echo "no information found";
        die();
    }
?>

<main>
    <div class="home">
        <div class="article-active article-bg">
            <div>
                <h1></h1>
                <h2>kore nani desu ka?</h2>
                <button class="btn-open">read more</button>
            </div>
            <style>
                .article-active::after {
                    background: url(img/bjerg.png) no-repeat;
                }
            </style>
        </div>

        <div class="article-list">
        </div>
    </div>
</main>