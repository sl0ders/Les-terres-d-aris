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
});
$(document).ready(function () {
    $("#contactForm").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            formError();
            submitMSG(false, "Avez-vous rempli le formulaire correctement?");
        } else {
            event.preventDefault();
            submitForm();
        }
    });


    function submitForm() {
        let name = $("#contact-name").val();
        let firstname = $("#contact-firstname").val();
        let email = $("#contact-email").val();
        let subject = $("#contact-subject").val();
        let message = $("#contact-message").val();

        $.ajax({
            type: "POST",
            url: "index.php?p=contact.add",
            data: "name=" + name + "&firstname=" + firstname + "&email=" + email + "&subject=" + subject + "&message=" + message,
            success: function (text) {
                if (text == "success") {
                    formSuccess();
                } else {
                    formError();
                    submitMSG(false, text);
                }
            }
        });
    }

    function formSuccess() {
        $("#contactForm")[0].reset();
        submitMSG(true, "Message bien envoyé !")
    }

    function formError() {
        $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
    }

    function submitMSG(valid, msg) {
        if (valid) {
            var msgClasses = "h3 text-center tada animated text-success";
        } else {
            var msgClasses = "h3 text-center text-danger";
        }
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
});
