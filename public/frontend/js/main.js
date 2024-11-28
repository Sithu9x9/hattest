// AOS.init({
//     once: true
// });

// Get All Validation Error Messages
const getValidationErrorMessages = (errors, update = false) => {
    $.each(errors, function (field, messages) {
        if (update) {
            var input = $("#update" + "-" + field);
        } else {
            var input = $("#" + field);
        }
        var errorMessage = `<span class="invalid-feedback">${messages[0]}</span>`;
        input.addClass("is-invalid");
        input.after(errorMessage);
    });
};

$("button#goBack").on("click", function (e) {
    e.preventDefault();
    window.history.back();
});

var $images = $("img");
var imagesCount = $images.length;
var imagesLoaded = 0;

if (imagesCount === 0) {
    $("#loadingOverlay").fadeOut();
} else {
    $images.each(function () {
        var img = $(this);
        if (img[0].complete) {
            checkImagesLoaded();
        } else {
            img.on("load", checkImagesLoaded);
            img.on("error", checkImagesLoaded);
        }
    });
}

function checkImagesLoaded() {
    imagesLoaded++;
    if (imagesLoaded >= imagesCount) {
        $("#loadingOverlay").fadeOut();
    }
}

// Page Loader
$(window).on("load", function () {
    // $("#loadingOverlay").fadeOut();

    var offcanvasNavbar = document.getElementById("offcanvasNavbar");
    offcanvasNavbar.addEventListener("show.bs.offcanvas", (event) => {
        document.body.classList.add("no-scroll");
    });

    offcanvasNavbar.addEventListener("hidden.bs.offcanvas", (event) => {
        document.body.classList.remove("no-scroll");
    });
});

var prev = 0;
$(window).on("scroll", function () {
    var scrollTop = $(window).scrollTop();
    // $(".floating-nav").toggleClass("hidden", scrollTop > prev);
    // prev = scrollTop;

    $(".floating-nav").toggleClass("scrolled", scrollTop > 100);
});
