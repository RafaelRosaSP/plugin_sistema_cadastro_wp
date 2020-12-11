jQuery('#cadastro').on('submit', function(e){
    e.preventDefault();
alert(login_obj.ajax_url);
    jQuery('#messagem_cadastro').html('Carregando...');
    jQuery('#botao_cadastro').hide();

    var form = {
        action: 'criar_conta',
        name: JQuery('#cadastro_name').val(),
        email: JQuery('#cadastro_email').val(), 
        senha: JQuery('#cadastro_senha').val(),    
    }

    jQuery.ajax({
        type: 'POST',
        url: login_obj.ajax_url,
        data: form,
        success: function (json){
            if(json.status == 2){
                jQuery("#messagem_cadastro").html("Cadastrado com sucesso!");
            }else{
                jQuery("#messagem_login").html("Erro ao cadastrar usuario."); 
            }
        }
    })
}); 