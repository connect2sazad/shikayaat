var collapse_expand_btn = document.getElementById('collapse_expand');
var right_arrow = '<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="user-select: auto;"><path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" style="user-select: auto;"></path></svg>';
var left_arrow = '<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="user-select: auto;"><path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" style="user-select: auto;"></path></svg>';
var collapse_icon = document.getElementById('collapse-icon');

var left_nav_section = document.getElementById('left-nav-section');
var right_nav_section = document.getElementById('right-content-section');

collapse_expand_btn.addEventListener('click', () => {

    var menu_item_name = document.getElementsByClassName('menu-item-name');

    if (menu_item_name[0].style.display == 'none') {

        right_nav_section.style.width = "85%";
        left_nav_section.style.width = "15%";
        for (var i = 0; i < menu_item_name.length; i++) {
            menu_item_name[i].style.display = "block";
        }

        collapse_icon.innerHTML = left_arrow;

        localStorage.setItem('nav-style', 'expanded');

    } else {

        for (var i = 0; i < menu_item_name.length; i++) {
            menu_item_name[i].style.display = "none";
        }

        left_nav_section.style.width = "max-content";

        var left_nav_section_current_width = left_nav_section.offsetWidth;

        right_nav_section.style.width = "calc(100% - " + left_nav_section_current_width + "px)";

        collapse_icon.innerHTML = right_arrow;

        localStorage.setItem('nav-style', 'collapsed');

    }

});



// set menu style on page load -  collapsed or expanded
var menu_item_name = document.getElementsByClassName('menu-item-name');
var nav_style = localStorage.getItem('nav-style') || localStorage.setItem('nav-style', 'expanded');
if (nav_style == 'collapsed') {


    for (var i = 0; i < menu_item_name.length; i++) {
        menu_item_name[i].style.display = "none";
    }

    left_nav_section.style.width = "max-content";

    var left_nav_section_current_width = left_nav_section.offsetWidth;

    right_nav_section.style.width = "calc(100% - " + left_nav_section_current_width + "px)";

    collapse_icon.innerHTML = right_arrow;

    localStorage.setItem('nav-style', 'collapsed');
}


$(document).ready(function () {
    $('.tab-button').click(function () {
        var tabId = $(this).data('tab');
        $('.tab-button').removeClass('active');
        $(this).addClass('active');
        $('.tab-panel').removeClass('active');
        $('#' + tabId).addClass('active');
    });

    $('.tab-button:first').click(); 

});