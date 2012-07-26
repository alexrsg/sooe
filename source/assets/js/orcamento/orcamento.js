$(function(){
    /* m�todo para pesquisar e autocompletar
     * um servi�o no campo e sua inclus�o no
     * grid.
     **/
    $( "#servico" ).autocomplete({
        source: function( request, response ) {
            $.ajax({
                url: "orcamento/find_servico",
                type: 'POST',
                dataType: "json",
                data: {
                    'name': request.term
                },
                success: function( data ) {
                    response( $.map( data.servico, function( item ) {
                        return {
                            label: item.sco + '  ::  ' + item.descricao,
                            descricao: item.descricao,
                            id: item.id,
                            sco: item.sco
                        }
                    }));
                }
            });
        },
        minLength: 3,
        select: function( event, ui ) {
            addServico(ui.item);
        //            log( ui.item ?
        //                "Selected: " + ui.item.label + ui.item.id :
        //                "Nothing selected, input was " + this.value);
        },
        open: function() {
            $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
        },
        close: function() {
            $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
        }
    });
    
    $('#btnSalvarProjeto').click(function(){
        /* valida��o
         **/
        if($('#txtDescricaoProjeto').val().length == 0){
            setLog('#log-projeto', 'Informe a descri��o!');
            return;
        }
        
        /* obter os servicos
         **/
        var table = $('#table-servicos');
        var itens = table.find('input');
        var servicos = new Array();        
        itens.each(function(index, value){
            servicos[index] = value.id;
        });
        
        if(servicos.length == 0){
            setLog('#log-projeto', 'Informe ao menos um servi�o!');
            return;
        }
        
        /* post com ajax
         **/
        $.post(
            'orcamento/salvar', 
            {
                'descricao': $('#txtDescricaoProjeto').val(),
                'ids': servicos
            },
            function(data){
                //callback
                if(data.success){
                    setLog('#log-projeto', 'Projeto salvo com sucesso!');
                }
            },
            'json'
            )
    });

    /* remover o registro de servi�o da listagem de servicos
     **/
    $('#table-servicos').find('input').live('click', function(){
        $(this).parent().parent().remove();
        
        if($('#table-servicos').find('input').length == 0){
            $('#projeto-servicos').hide();
        }
    });
    
    function addServico( item ) {
        if(item){
            var table = $('#table-servicos');
            
            //verifica se o item j� foi incluido
            var itens = table.find('input');
            var repetido = false;
            if(itens){
                $.each(itens, function(index, value){                    
                    if(value.id == item.id.toString()){
                        repetido = true;
                        return;
                    }
                });
            }

            if(!repetido){
                var row = '<tr><td><input id="' + item.id + '" type="button" item="' + item.id + '" class="remove"></input></td><td>' + item.sco + '</td><td>' + item.descricao + '</td></tr>';
                table.children('tbody').first().after(row);
                table.parent().fadeIn(200);
                table.scrollTop(0);
            }
            else{
                setLog('#log-servicos', 'Servi�o j� inclu�do!');
            //                var log = $('#log-servicos');
            //                log.html('<p>Servi�o j� inclu�do!</p>');
            //                //                log.slideDown(200);
            //                log.slideDown(200).delay(1000).slideUp(200);
            }
        }
    }
    
    function setLog(idDiv, msg){
        var log = $(idDiv);
        log.html('<p>' + msg + '</p>');
        log.slideDown(200).delay(1000).slideUp(200);
    }
});