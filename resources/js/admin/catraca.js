import $ from 'jquery';
let selectPais = $('select[name=country]');
let selectEstados = $('select[name=state]');

function loadCities(obj){
    let idEstado = $(obj).val();

    $.get('get-cidades/' + idEstado, function (cidades) {
        let selectCity = $('select[name=city]');
        let defaultCity = selectCity.attr('data-default');
        selectCity.empty();
        $.each(cidades, function (key, value) {
            let selected = (defaultCity.length>0 && defaultCity==value.id || idEstado==19 && value.id==3570) ? 'selected' : '';
            $('select[name=city]').append(`<option value='${value.id}' ${selected}>${value.name}</option>`);
        });
    });
}
window.addEventListener('load', function () {
    let idPais = selectPais.val();
    if(idPais === '2'){
        $("#state_block").addClass("d-none");
        $("#city_block").addClass("d-none");
        $("#outro_pais_block").removeClass("d-none");
    }else{
        $("#state_block").removeClass("d-none");
        $("#city_block").removeClass("d-none");
        $("#outro_pais_block").addClass("d-none");
    }
})
if(selectPais.length && selectEstados.length){
    selectPais.on('change', function () {
        let idPais = $(this).val();

        if(idPais === '2'){
            $("#state_block").addClass("d-none");
            $("#city_block").addClass("d-none");
            $("#outro_pais_block").removeClass("d-none");
        }else{
            $("#state_block").removeClass("d-none");
            $("#city_block").removeClass("d-none");
            $("#outro_pais_block").addClass("d-none");
        }
    });
    // Select Estado/Cidade
    selectEstados.on('change', function () {
        loadCities(this)
    });

    $(document).ready(function () {
        loadCities(selectEstados)
    });
}
