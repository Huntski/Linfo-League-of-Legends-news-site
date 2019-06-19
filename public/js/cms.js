/*
* author: Wieb uwu
*/

// --------------------------------------------------------------------

let btn_nav_article = document.querySelector('.btn_nav_article');
let btn_nav_event = document.querySelector('.btn_nav_event');
let form_article =document.querySelector('.add_article');
let form_event =document.querySelector('.add_event');

btn_nav_article.addEventListener('click', function() {
    btn_nav_event.classList.remove('focus');
    btn_nav_article.classList.add('focus');

    form_article.style.display = 'flex';
    form_event.style.display = 'none';
});

btn_nav_event.addEventListener('click', function() {
    btn_nav_event.classList.add('focus');
    btn_nav_article.classList.remove('focus');

    form_article.style.display = 'none';
    form_event.style.display = 'flex';
});

// --------------------------------------------------------------------

let upload_label = document.querySelector('.upload_label');
let a_img = document.querySelector('.a_img');
let a_img_msg = document.querySelector('.a_img_msg');
upload_label.addEventListener('click', function(){
    let i = 0;
    let file_check = setInterval(function() {
        if (a_img.files.length !== 0) {
            a_img_msg.innerHTML = a_img.files[0].name;
            a_img_msg.classList.add('orange');
            clearInterval(file_check);
        }
    }, 1000);
});

// --------------------------------------------------------------------

console.log(`Icons made by Joshua-chann <3`);

