$(document).ready(function(){
    // Form Update
    let form = '#form-update';

    // Button Update
    let button = '.btn-update';

    // Fetching Data to form Delete
    $('body').on('click', button,function(event){
        event.preventDefault();

        let url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                // Getting value of url
                let attribute = $('#form-update').attr('data-action');

                // update the url
                $('#form-update').attr('data-action', attribute.replace(/\/[^\/]*$/, '/repairment/'+response.id))
            },
            error: function(response) {
                console.log(response)
            }
        });
    });

    // Form Update
    $(form).on('submit', function(event){
        event.preventDefault();
        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                location.reload();
            },
            error: function(response) {
                console.log(response)
            }
        });
    });
});