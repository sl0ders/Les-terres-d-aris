new WOW().init();
// SideNav Initialization
$(".button-collapse").sideNav();

$(document).ready(function () {
    let hauteur = 0;
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > hauteur) {
                $('.navigation1').slideUp(500);
                $('.navigation2').show(600);
            } else {
                $('.navigation2').hide(600);
                $('.navigation1').slideDown(300);
            }
        });
    });
});

function showDesc() {
let desc = $('#desc').data('desc');
    if (desc.is(':visible')) {
        desc.hide()
    } else {
        desc.show()
    }
}

