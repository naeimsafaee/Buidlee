const menu = document.querySelector('.mobile-menu-icon');
const menuLinks = document.querySelector('.mobile-menu');
const close = document.querySelector('.close');
const overlay = document.querySelector('.overlay');


menu.addEventListener('click', function() {
    menuLinks.classList.toggle('active')
    $('.overlay').fadeIn(400)
    $('body').css("position" , "fixed")

})
close.addEventListener('click', function() {
    menuLinks.classList.remove('active')
    $('.overlay').fadeOut(100)
    $('body').css("position" , "relative")
})
overlay.addEventListener('click', function() {
    menuLinks.classList.remove('active')
    $('.overlay').fadeOut(100)
    $('body').css("position" , "relative")
});

var $root = $('html, body');

$('a[href^="#"]').click(function() {
    var href = $.attr(this, 'href');

    $root.animate({
        scrollTop: $(href).offset().top
    }, 700, function () {
        window.location.hash = href;
    });

    return false;
});