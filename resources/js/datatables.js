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

    table.on('draw.dt, click', function() {
        reloadDeleteButtons();
    })
    reloadDeleteButtons();
})

function reloadDeleteButtons() {
    $('.show_delete_button').on('click', function() {
        $(this).hide()
        let item_id = $(this).attr('id').split("_").pop()
        $('#delete_' + item_id).show()
    })
}