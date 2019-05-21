<?php
    $images = scandir("img/");
    $title = array(0 => "わたし わ げい です", 1 => "あなた わ さかな お だべる", 2 => "おにーちゃん わ すごい");
    $par = array(0 => "魚", 1 => "わたし ほしい に せんぱい お だべる", 3 => "かれ わ すごい です ね？");
?>

<main>
    <div class="home">
        <div class="article-active article-bg">
            <div>
                <h1>losum ipsum</h1>
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
            <?php
                for ($i = 0; $i < count($title); $i++) :
                    $imgI = $i + 2;
                    $img_url = $images[$imgI];
                    echo $img_url;
                    ?>
                    <article>
                        <h1>a<?=$title[$i]?></h1>
                        <h2>b<?=$par[$i]?></h2>
                        <img src="img/<?=$img_url?>" alt=" ">
                    </article>
            <?php endfor; ?>
        </div>
    </div>
</main>