alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-success";
alertify.defaults.theme.cancel = "btn btn-secondary";
alertify.defaults.theme.input = "form-control";

$('.confirmation-form[data-text]').submit(function(evt){
    evt.preventDefault();
    let text = $(this).attr('data-text');
    return alertify.confirm(
        text,
        function () {
            evt.currentTarget.submit();
            return true;
        }
    )
    .set(
        {
            movable: false,
            title: '<i class="fa fa-info-circle text-info"></i> Aviso importante',
            labels: {
                ok: 'SIM',
                cancel: 'NÃO'
            },
        }
    )
});
$('a.confirmation-btn[data-text]').on('click', function(evt){
    evt.preventDefault();

    let target = $(evt.target);
    if(!target.is('a')){
        target = target.parent('a');
    }

    let text = $(this).attr('data-text');
    alertify.confirm(
        text,
        function(e) {
            if(e.index===0){
                window.location = target.attr('href');
            }
        }
    ).set(
        {
            movable: false,
            title: '<i class="fa fa-info-circle text-info"></i> Aviso importante',
            labels: {
                ok: 'SIM',
                cancel: 'NÃO'
            },
        }
    );
});

$('.confirmation-simple[data-text]').on('click',function(evt){
    evt.preventDefault();
    let message = $(this).attr('data-text');
    alertify.alert()
      .setting({
          movable: false,
          title: '<i class="fa fa-info-circle text-info"></i> Aviso importante',
          label:'Fechar',
          message
      }).show();
});
