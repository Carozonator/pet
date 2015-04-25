<style>
    #register .publicar label+input,#register .publicar label+textarea{
        width:100%;
    }
    #register .publicar form div{
        margin-bottom:10px;
    }
</style>
<div id="register" class="overlay_box" style="">
    <div class="publicar" style="margin:0px;padding:20px;">
            <div class="publicar_item_header" >Reg&iacute;strate</div>
            <span style="color:#999;">* Datos obligatorios</span>
            <div style="height:10px;width:100%"></div>
                <form action="/account/register" method="POST">
                    <div><label>Nombre *</label><input name="firstname" type="text"></div>
                    <div><label>Apellido *</label><input name="lastname" type="text"></div>
                    <div><label>Usuario *</label><input name="username" type="text"><br/><span class="validation"></span></div>
                    <div><label>Email *</label><input name="email" type="text"><br/><span class="validation"></span></div>
                    <div><label>Confirmar Email *</label><input name="confirm_email" type="text"><br/><span class="validation" id="confirm_email"></span></div>
                    <div><label>Tel&eacute;fono</label><input name="phone" type="text"></div>
                    <div><label>Documento (CI)</label><input name="documento" type="text"></div>
                    <div><label>Contrase&ntilde;a *</label><input name="password" type="password"><br/><span class="validation"></span></div>
                    <div><label>Confirmar Contrase&ntilde;a *</label><input name="confirm_password" type="password"><br/><span class="validation" id="confirm_password"></span></div>
                    <div style="text-align:center;margin-top:10px;"><button onclick="submitUser(this);return false;" >Registrarme</button></div>
                </form>
            <div style="clear:both;"></div>
    </div>
    <div class="overlay_close" onclick="closeOverlay();">X</div>
</div>

<script>
function closeOverlay(){
    $('.overlay').hide();
    $('.overlay_box').hide();
}
function submitUser(elem){
    $('.validation').html('');
    var form = $(elem).closest('form');
    var form_submit = true;
    var email = form.find('input[name="email"]').val().trim();
    var email_con = form.find('input[name="confirm_email"]').val().trim();
    var password = form.find('input[name="password"]');
    var password_con = form.find('input[name="confirm_password"]');
    
    if(email == email_con){
        //$('#confirm_email').html(' &#x2713;');
    }else{
        $('#confirm_email').html(' &#x2717;');
        form_submit = false;
    }
    
    if(password.val() == password_con.val()){
        //$('#confirm_password').html(' &#x2713;');
    }else{
        $('#confirm_password').html(' &#x2717;');
        form_submit = false;
    }
    if(password.val().length<5){
        $('input[name=password]').parent().find('.validation').html('minimo 5 caracteres');
        form_submit = false;
    }
    if(! Validation.email(email)){
        $('input[name=email]').parent().find('.validation').html('email no es valido');
        form_submit = false;
    }
    
    if(!form_submit){
        return false;
    }else{
        var url = '/registracion/registerUser';
        $.ajax({
           type: "POST",
           url: url,
           dataType:'json',
           data: form.serialize(), // serializes the form's elements.
           success: function(data){
               console.log(data);
               if(data.error==true){
                   $('input[name='+data.location+']').parent().find('.validation').html(data.message);
               }else{
                   window.location = "/registracion/confirmar";
                   //alert("Registrado!");
                   //window.location=window.location;
               }
           }
       });
        //form.submit();
    }
}
</script>