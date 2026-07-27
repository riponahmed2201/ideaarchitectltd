/*==============================================================*/
// Contact Form JS
/*==============================================================*/
(function ($) {
    "use strict";

    $("#contactForm").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            formError();
            submitMSG(false, "Did you fill in the form properly?");
        } else {
            event.preventDefault();
            submitForm();
        }
    });

    function submitForm() {
        $.ajax({
            type: "POST",
            url: window.contactFormUrl,
            data: {
                _token: window.csrfToken,
                name: $("#name").val(),
                email: $("#email").val(),
                phone_number: $("#phone_number").val(),
                message: $("#message").val(),
            },
            success: function (response) {
                if (response.status === "success") {
                    formSuccess();
                    submitMSG(true, response.message);
                } else {
                    formError();
                    submitMSG(false, response.message);
                }
            },
            error: function (xhr) {
                formError();
                var message = xhr.responseJSON?.message || "Something went wrong. Please try again.";
                submitMSG(false, message);
            }
        });
    }

    function formSuccess() {
        $("#contactForm")[0].reset();
    }

    function formError() {
        $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
    }

    function submitMSG(valid, msg) {
        var msgClasses = valid ? "h4 tada animated text-success" : "h4 text-danger";
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
}(jQuery));
