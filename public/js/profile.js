$(document).ready(function(){
    // Form Update
    let form = '#form-update';

    // Button Update
    let button = '#button-update';

    $(form).on('change', function(event){

        // Remove class
        $(button).removeClass('d-none');
    });
});