jQuery(function() {
    $('.wait').delay(500).fadeOut();
    let table = $('#data_table').DataTable({
        autoWidth: false,
        responsive: true,
        "order": []
    });

    $.when(
        $('.hide').delay(600).fadeIn()
    ).then(function() {
        table.responsive.recalc();
    });

    $('.show-products').on('click', function() {
        $('#view_report_' + getId($(this))).toggle()
    })

    $('.show_delete_button').on('click', function() {
        $(this).hide()
        $('#delete_' + getId($(this))).show()
    })
})

function getId(item) {
    return item.attr('id').split("_").pop()
}