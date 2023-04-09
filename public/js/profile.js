$(document).ready(function(){
    // Form List Update
    let name = '#name_form';
    let email = '#email_form';

    // Form Update
    let form = '#form-update';

    // Button Update
    let button = '#button-update';

    $(form).on('change', function(event){

        // Making Sure There is a change
        if($(name).attr('data-initial') != $(name).val() || $(email).attr('data-initial') != $(email).val())
        {
            // Remove class
            $(button).removeClass('d-none');
        }else{
            // Add class
            $(button).addClass('d-none');
        }

    });
});