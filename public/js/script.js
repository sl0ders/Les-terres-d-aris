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

    let img = document.getElementById('avatar');
    img.valueOf();

    let btndesc = $('.btn-av');
    btndesc.on('click', ()=>{
        $('.description').data('desc').css('display',' block')
    })
});


