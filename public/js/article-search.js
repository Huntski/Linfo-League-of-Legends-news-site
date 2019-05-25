let inp_search_article = document.querySelector(".search-article");
let article_list = document.querySelector(".article-list");

inp_search_article.addEventListener('click', searchForArticle(inp_search_article.value));

function searchForArticle(input) {
    
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.status == 4 && this.status == 200) {
            article_list.innerHTML = this.responseText;
        }
    }

    let httpString = "php/search_article.php?query=" + input;

    xmlhttp.open("GET", httpString, true);
    xmlhttp.send();
}