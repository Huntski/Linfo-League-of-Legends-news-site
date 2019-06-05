let body = document.querySelector('body');
setTimeout(() => {
    body.classList.remove('preload');
    console.info("Page Preloaded");
}, 1);

// dropdown menu

let menu_icon = document.querySelector('.menu-icon');
let header_dropdown = document.querySelector('.header-dropdown');
let lastKnownDropdownTop = header_dropdown.style.top;
let main = document.querySelector('main');

function lowerMenu() {
    header_dropdown.style.top = '0px';
}

function hideMenu() {
    header_dropdown.style.top = lastKnownDropdownTop;
}

menu_icon.addEventListener('click', () => {
    if (header_dropdown.style.top != '0px') {
        lowerMenu();
        main.addEventListener('click', hideMenu);
        return;
    }
    main.removeEventListener('click', hideMenu);
});

try {
    let active_bg = document.querySelector('.article-active > .img-background');
    let read_more = document.querySelector('.article-active > div > a > button'); // :P

    // read_more.addEventListener()
    console.log(active_bg);
} catch (e) {
    console.error("element not found: article_bg");
}