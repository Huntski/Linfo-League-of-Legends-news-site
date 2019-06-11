let inp_search = document.querySelector(".search-article");
let article_list = document.querySelector(".article-list");

let default_list = article_list.innerHTML;

// check for input in search bar
inp_search.addEventListener('keyup', () => { setTimeout(searchForArticle,1); });
function searchForArticle() {

    if (!inp_search.value) {
        article_list.innerHTML = default_list;
        return;
    }

    let url;
    window.location.href.includes('user') ? url = window.location.href.split('user')[0]+'search-'+inp_search.value : url = window.location.href.split('news')[0]+'search-'+inp_search.value;

    let xmlhttp = new XMLHttpRequest;

    xmlhttp.onreadystatechange = function () {
        if (this.status == 4 || this.status == 200) {
            let obj = JSON.parse(this.response);
            let limit = 6;
            let a = 0;
            let html = '';
            for (let i in obj) {
                a++;
                if (a < limit) {
                    let par_limit = 6;
                    let words = obj[i].a_par.split(" ");
                    let a_par = '';
                    for (let z = 0; z < par_limit; z++) a_par += words[z] + ' ';
                    html += `
                    <article>
                        <a href='article-`+obj[i].a_id+`'>
                            <div>
                            <h1>`+obj[i].a_title+`</h1>
                            <h2>`+a_par+`</h2>
                            </div>
                            <div class=\"img-background\">
                                <img src=\"img/`+obj[i].a_img_links.split('[&&]')[0]+`\" alt=\"\">
                            </div>
                        </a>
                    </article>
                    `;
                }
            }
            article_list.innerHTML = html;
        }
    }

    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

// <article>
// <a href='article-".$article_info->a_id."'>
//     <div>
//     <h1>".$article_info->a_title."</h1>
//     <h2>".$article_par."</h2>
//     </div>
//     <div class=\"img-background\">
//         <img src=\"img/". explode("[&&]", $article_info->a_img_links)[0] ."\" alt=\"\">
//     </div>
// </a>
// </article>