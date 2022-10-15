$(document).on('click', '.ajax-pagination-page-link', function (e) {
    e.preventDefault();
    var page = $(this).data("page")
    var element = $(this).parents('.ajax-data-container')
    var url = element.data('ajaxurl')
    $.ajax({
        type: "get",
        url: url,
        data: { "page": page },
        success: function (response) {
            element.html(response)
        }
    });
})
