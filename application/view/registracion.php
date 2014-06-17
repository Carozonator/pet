<div class="publicar" style="padding:20px;overflow-x:hidden;overflow-y:auto">
    <div class="publicar_item">
        <div class="publicar_item_header">Informacion</div>
        <div class="publicar_sub_item">
            <form action="/registracion" method="POST">
                <input type="hidden" name="action" value="registerUser"/>
                <label>Nombre</label><input name="firstname" type="text"><br/>
                <label>Apellido</label><input name="lastname" type="text"><br/>
                <label>Usuario</label><input name="username" type="text"><br/>
                <label>Email</label><input name="email" type="text"><span class="validation"></span><br/>
                <label>Confirmar Email</label><input name="confirm_email" type="text"><span class="validation" id="confirm_email"></span><br/>
                <label>Telefono</label><input name="phone" type="text"><br/>
                <label>Contrase&nacute;a</label><input name="password" type="password"><span class="validation"></span><br/>
                <label>Confirmar Contrase&nacute;a</label><input name="confirm_password" type="password"><span class="validation" id="confirm_password"></span><br/>
                <button onclick="submitUser(this);return false;" style="float:right">Enviar</button>
            </form>
        </div>
    </div>
</div>

<script>
function submitUser(elem){
    $('.validation').html('');
    var form = $(elem).closest('form');
    var form_submit = true;
    var email = form.find('input[name="email"]');
    var email_con = form.find('input[name="confirm_email"]');
    var password = form.find('input[name="password"]');
    var password_con = form.find('input[name="confirm_password"]');
    
    if(email.val() == email_con.val()){
        $('#confirm_email').html(' &#x2713;');
    }else{
        $('#confirm_email').html(' &#x2717;');
        form_submit = false;
    }
    
    if(password.val() == password_con.val()){
        $('#confirm_password').html(' &#x2713;');
    }else{
        $('#confirm_password').html(' &#x2717;');
        form_submit = false;
    }
    if(password.val().length<5){
        password.next().html(' minimo 5 caracteres');
        form_submit = false;
    }
    if(! Validation.email(email.val())){
        email.next().html(' email no es valido');
        form_submit = false;
    }
    
    if(!form_submit){
        return false;
    }else{
        form.submit();
    }
}
</script>