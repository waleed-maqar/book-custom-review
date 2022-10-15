//
$(document).on("scroll", function (e) {
    if ($(window).scrollTop() > 1000) {
        $(".go-to-top").show()
    } else {
        $(".go-to-top").hide()

    }
})
$(".go-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 200);
    return false;
});
//
$(document).on("click", ".navbar-toggler", function () {
    $(".custom-navbar-collapse").toggle(400);
})
//
$(document).on('click', '.custom-dropdown-toggle', function () {
    let menu = ".custom-dropdown-menu"
    $(menu).toggle('"slide", {direcion:"left"}, 400');
});

$(document).on('click', '*', function (e) {
    if ($(e.target).closest(".custom-navbar-collapse, .navbar-toggler").length === 0) {
        $(".custom-navbar-collapse").hide()
    }
    if ($(e.target).closest(".custom-dropdown-menu, .custom-dropdown-toggle").length === 0) {
        $(".custom-dropdown-menu").hide()
    }
});
//
$(document).on('click', '.sidebar-toggle-btn div', function () {
    $(this).hide(600)
    $(this).siblings().show(600)
})
//
$(document).on('click', '.btn-alert', function () {
    var message = $(this).data('message');
    patt = /[\u0600-\u06FF\u0750-\u077F]/;
    checkAr = patt.test(message); // Check If message is in Arabic
    var confirmMessage = "Do you realy want " + message;
    if (checkAr === true) {
        confirmMessage = "هل تريد حقا " + message;
    }
    // confirm(message);
    if (confirm(confirmMessage) === false) {
        return false;
    };
})
//
$(document).on('change', '#chooseparentcat', function () {
    if ($(this).val()) {
        let cat = $(this).val()
        let action = $(this).data('action')
        let book = $(this).data('book')
        $.ajax({
            method: "get",
            data: { "book": book },
            url: "/choosesubcat/" + cat + "/" + action,
            success: function (response) {
                $('#choosesubcat').html(response)
            }
        });
    } else {
        $('#choosesubcat').empty()

    }
});
//
$(document).on('click', '.element-hide-btn', function () {
    let element = $(this).data('element');
    $(element).hide(400)
});
$(document).on('click', '.element-show-btn', function () {
    let element = $(this).data('element');
    $(element).show(400)
});
$(document).on('click', '.element-toggle-btn', function () {
    let element = $(this).data('element');
    $(element).toggle(400)
});
//
$(document).on('click', '.text-seemore', function () {
    let element = $(this).data('text')
    $(element + '-full').show()
    $(element + '-excerpt').hide()
})
$(document).on('click', '.text-seeless', function () {
    let element = $(this).data('text')
    $(element + '-excerpt').show()
    $(element + '-full').hide()
})
//
$('.scale-rate-single-star').hover(function () {
    $(this).addClass('rate-star-orange')
    $(this).prevAll('.scale-rate-single-star').addClass('rate-star-orange')

}, function () {
    // out
    if (!$(this).hasClass('rate-star-rated')) {
        $(this).removeClass('rate-star-orange')
    }
    if (!$(this).prevAll().hasClass('rate-star-rated')) {
        $(this).prevAll('.scale-rate-single-star').removeClass('rate-star-orange')
    }
}
);
$('.scale-rate-single-star').click(function () {
    $('#reviewrateforscale-' + $(this).data('scale')).val($(this).data('rate'))
    $(this).addClass('rate-star-rated')
    $(this).prevAll('.scale-rate-single-star').addClass('rate-star-rated')
    $(this).prevAll('.scale-rate-reseted').removeClass('scale-rate-reseted')
    $(this).nextAll().removeClass('rate-star-rated')
    $(this).nextAll().removeClass('rate-star-orange')
    $(this).addClass('rate-star-orange')
    $(this).prevAll('.scale-rate-single-star').addClass('rate-star-orange')

})
$('.scale-rate-reset').click(function () {
    $('#reviewrateforscale-' + $(this).data('scale')).val($(this).data('rate'))
    $(this).addClass('scale-rate-reseted')
    $(this).nextAll().removeClass('rate-star-rated')
    $(this).nextAll().removeClass('rate-star-orange')
})
$(document).on('keyup', '.new-review-text', function () {
    $('#newreviewtextarea').val($(this).text())
})
$(document).on('click', '.new-review-text', function () {
    $(this).children().remove()
})
//
$(document).on('click', '.single-review-add-reaction', function () {
    let review = $(this).data('review')
    let action = $(this).data('action')
    $.ajax({
        type: "get",
        url: "/review/" + review + "/add/" + action,
        success: function (response) {
            $('#singlebookreview-' + review).html(response)
        }
    });
})
$(document).on('click', '.review-card-send-report', function () {
    let review = $(this).data('review')
    $.ajax({
        type: "get",
        url: "/reviewreport",
        data: { "review": review },
        success: function (response) {
            $('.add-review-report').html(response)
        }
    });
})
// Data list

// $('#bookauthorname').change(function () {
//     var idValue = $(this).data("value")
//     $('#bookauthorid').val(idValue)
// });
// $(document).on('input', '#bookauthorname', function () {
//     var authorname = $(this).val();
//     var elementOption = $("#authors option[value='" + authorname + "']")
//     $(this).data('value', elementOption.text());
// });


$(document).on('input', '.datalist-input', function () {
    var selected = $(this).val();
    var datalist = $(this).data("datalist")
    var elementOption = $(datalist + " option[value='" + selected + "']")
    $(this).data('value', elementOption.text());
});
$('.datalist-input').change(function () {
    var idValue = $(this).data("value")
    var inputValue = $(this).data('inputvalue')
    $(inputValue).val(idValue)
});

$(document).on("click", '.add-another-scale', function () {
    let i = $(this).data("nextscale")
    if (i <= 6) {
        let element = '<div class="form-group"><input type = "text" name = "scales[' + i + '][scale]"placeholder = "scale" class="form-control" ><textarea name="scales[' + i + '][explain]" id="" placeholder="Explain scale" class="form-control"></textarea></div>'
        $(this).before(element)
        $(this).data("nextscale", i + 1)
    } else {
        $(this).hide()
    }

})
