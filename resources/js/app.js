import "./bootstrap";

// Import all of Bootstrap's JS
import * as bootstrap from "bootstrap";
import "bootstrap-icons/font/bootstrap-icons.css";

const toastElList = document.querySelectorAll(".toast-show");
const toastList = [...toastElList].map((toastEl) => {
    new bootstrap.Toast(toastEl).show();
});

// Handle Apply Job Modal Close Event
const myModalEl = document.querySelector(".apply-job-modal");
if (myModalEl) {
    myModalEl.addEventListener("hide.bs.modal", (event) => {
        $(".is-invalid").removeClass("is-invalid");
        $(".invalid-feedback").remove();
        $("#job-apply-form")[0].reset();
        $("#summernote").summernote("code", "");
    });
}

// Submit Job Apply Form
$(document).on("submit", "#job-apply-form", function (e) {
    e.preventDefault();

    var form = $(this);
    var url = form.attr("action");
    var method = form.attr("method");

    var formData = new FormData(this);

    $.ajax({
        type: method,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function () {
            $(".is-invalid").removeClass("is-invalid");
            $(".invalid-feedback").remove();

            $("#apply-job-button-loader").show();
            $("#apply-job-button-icon").hide();
            $("#apply-job-button").attr("disabled", true).css("cursor", "wait");
        },
        success: function (data) {
            form[0].reset();
            $(".apply-job-modal").modal("hide");
            const toastEl = document.querySelector("#applyJobSuccessToast");
            new bootstrap.Toast(toastEl).show();
            $("#applyJobSuccessToast .toast-body").text(data.message);
        },
        error: function (xhr, status, error) {
            if (xhr.status == 401) {
                Command: toastr["error"]("Unauthorized. Please Login First");
            } else if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                getValidationErrorMessages(errors);
            } else {
                alert(xhr.status);
            }
        },
        complete: function (response) {
            $("#apply-job-button-loader").hide();
            $("#apply-job-button-icon").show();
            $("#apply-job-button")
                .attr("disabled", false)
                .css("cursor", "pointer");

            $("#summernote").summernote("code", "");
        },
    });
});

// Submit Contact Us Form
$(document).on("submit", "#contact-us-form", function (e) {
    e.preventDefault();

    var recaptchaResponse = $("#g-recaptcha-response").val();

    if (recaptchaResponse == "") {
        if ($("#recaptcha-error-message").length === 0) {
            var alertHtml = `<p class="text-danger m-0" id="recaptcha-error-message"><small>Please check recaptcha!</small></p>`;

            $(alertHtml).insertAfter(".g-recaptcha").fadeIn().delay(3000).fadeOut(1000, function () {
                $(this).remove()
            });
        }
    } else {
        $("input#response").val(recaptchaResponse);
        this.submit();
    }
});
