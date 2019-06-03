let inp_search = document.querySelector(".search-article");
let article_list = document.querySelector(".article-list");

inp_search.addEventListener('keyup', searchForArticle);

function searchForArticle() {

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.status == 4 || this.status == 200) {
            console.log(this.responseText);
        }
    }

    let httpString = "";
    let params = "submit=true";

    xmlhttp.open("POST", httpString, true);
    xmlhttp.send();

    console.log("search query: " + inp_search.value);
}