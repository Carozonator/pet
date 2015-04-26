
<div class="main-content_container" style="margin:30px auto;width:500px;">
    <div class="header">Ingresa a tu cuenta</div>
    <form style="margin-top:10px;" method="POST" action="/account/login/">
        <div style="width:400px;text-align:right;position:relative;border-bottom:1px solid lightgrey;">
            <div style="margin:20px">
                <label>Usuario o Email: </label><input style="width:200px" name="user" type="text">
            </div>
            <div style="margin:20px">
                <label>Password: </label><input style="width:200px" name="password" type="password">
            </div>
            <?php if($invalid==true){ ?>
                <div style="padding-top:10px;color:red;text-align:center;">Verifica la clave y/o el usuario que ingresaste</div>
            <?php } ?>
            <?php if($contactar===true){ ?>
                <div style="padding-top:10px;color:red;text-align:center;">Necesitas ingresar a tu cuenta para contactar al publicador</div>
            <?php } ?>
            <div style="position:absolute;right:-20px;top:36px;" onclick="$(this).closest('form').submit();" class="icon-circle-arrow-right submit_arrow"></div>
        </div>
    </form>
    
    <div style="font-size:15px;margin-top:20px;">
        <a href="#" onclick="Register.open()">No estas registrado?</a><br/><br/>
        <a href="/account/recupere_contrasena/">Has olvidado tu contrase&ntilde;a?</a>
    </div>
</div>
<script>
$("input").keypress(function(event) {
    if (event.which == 13) {
        event.preventDefault();
        $(this).closest('form').submit();
    }
});
</script>
