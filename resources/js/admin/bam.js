let formBam = $('form#bamCreate');
let selectEstados =$('select[name=state]');

if(formBam.length){

    $('input[type="checkbox"]#status_acompanhante').on('change',function(){
        if ($(this).is(':checked')) {
            formDisable()
            return;
        }
        formDisable(true)
    })

    $(document).ready(function(){
        formDisable()
    })

}

function formDisable(){
    formBam.find('#form-bam').find('input:not([type="checkbox"],[name="_token"]),select').each(function(){
        if(!$('input[type="checkbox"]#status_acompanhante:checked').length){
            $('#form-bam').hide();
            $(this).attr('disabled', 'disabled')
            return;
        }
        $('#form-bam').show();
        $(this).removeAttr('disabled')
    })
}
