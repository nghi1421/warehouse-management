import $ from 'jquery'

$('.table-body')

$('tr td .btn-delete').on('click', function (event) {
    const _self = event.target;
    
    _self.parentElement.parentElement.remove()
})

$('.btn-add-import-detail').on('click', function (event) {
    event.preventDefault();
    let row = $('.btn-add-import-detail').parent().parent().parent().children().length - 1
    
    //call api check length category now.
    
    // $.ajax({
    //     url: route(''),

    //     success: function (result) {
    //         $('#smallModal').modal("show");
    //         $('#smallBody').html(result).show();
    //     },
    //     complete: function () {
    //         $('#loader').hide();
    //     },
    // })

    $($(`#category-${row - 1}`).html()).insertAfter(`#category-${row - 1}`);

})
