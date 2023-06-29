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

$('#search-user').on('keyup', function () {
    const searchTerm = $('#search-user').val();
    const url = window.location.origin;

    if(searchTerm==""){
        $("#memListUsers").html("");
        $('#result-user').hide();
    }
    else{
        $.ajax({
            type: 'GET',
            data: {
                search: searchTerm
            },
            url:  `${url}/dashboard/users/search` ,
            success(response) {
                if (!response.error && response !== '') {

                    $('#memListUsers').empty().html(response);
                    $('#result-user').show();
                }
            },  
        })
    }
})

$('#search-customer').on('keyup', function () {
    const searchTerm = $('#search-customer').val();
    const url = window.location.origin;

    if(searchTerm==""){
        $("#memListCustomers").html("");
        $('#result-customer').hide();
    }
    else{
        $.ajax({
            type: 'GET',
            data: {
                search: searchTerm
            },
            url:  `${url}/dashboard/customers/search` ,
            success(response) {
                if (!response.error && response !== '') {

                    $('#memListCustomers').empty().html(response);
                    $('#result-customer').show();
                }
            },  
        })
    }
})