let menuBam = $('.confirmation-moda-bam');

if(menuBam.length){
    document.onkeyup = function(e) {
        if (e.ctrlKey && e.which == 66) {
            menuBam.trigger('click')
        }
    };
    menuBam.on('click',function(evt){
        evt.preventDefault();
        alertify.genericDialog || alertify.dialog('genericDialog',function(){
            return {
                main:function(content){
                    this.setContent(content);
                },
                setup:function(){
                    return {
                        focus:{
                            element:function(){
                                return this.elements.body.querySelector(this.get('selector'));
                            },
                            select:true
                        },
                        options:{
                            basic:true,
                            maximizable:false,
                            resizable:false,
                            padding:false,
                            movable:false
                        }
                    };
                },
                settings:{
                    selector:undefined
                }
            };
        });
        alertify.genericDialog ($('#buscaBamSelect')[0]);
        let searchDocument = $('#pacientSelect');
        searchDocument.select2({
            ajax: {
                url: '/paciente/search?include=person.personable',
                dataType: 'json',
                quietMillis: 250,
                data: function (term, page) {
                    return {
                        filter: {
                            pacient: term
                        },
                        page
                    };
                },
                results: function (response, page) {
                   response.data.forEach(function (item, index) {
                        return response.data[index] = {
                            id: item.id,
                            text: item.person.personable.anonPerson ? item.person.personable.description : item.person.name
                        };
                    });
                    return {
                        results: response.data,
                        total_count: response.total,
                        more: (response.last_page>response.current_page),
                        page
                    };
                },
                cache: true
            }
        });

        let actBtn = $('body').find('#pacientSelectAction')[0];
        actBtn = $(actBtn);
        searchDocument.on('change', function (e){
            actBtn.removeAttr('disabled');
            actBtn.text(actBtn.attr('data-original'))
        })
        actBtn.on('click', function (){
            let data = searchDocument.select2('data');
            if(data===null){
                searchDocument.select2('focus');
                searchDocument.select2('open');
                return false;
            }
            window.location = `/bam/${data.id}`
        });
        //force focusing password box
    });
}
