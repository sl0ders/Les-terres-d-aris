new WOW().init();
// SideNav Initialization
$(".button-collapse").sideNav();

$(document).ready(function () {
    let hauteur = 0;
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > hauteur) {
                $('#nav1').slideUp(500);
                $('#nav2').show(600);
            } else {
                $('#nav2').hide(600);
                $('#nav1').slideDown(300);
            }
        });
    });

    let btn = $('.btn-fab');
    if(btn.length){
        btn.each(function(){
            $(this).click(()=>{
                $(this).parents().find('#desc').toggle(500);
            })
        })
    }
});


