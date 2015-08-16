
<div class="main-content_container message_container">
    <div class="header">Ingresa a tu cuenta</div>
    <div style="border-bottom:1px solid lightgrey;">
        <form class="form-horizontal" method="POST" action="/account/login/">
            <div class="form-group">
                <label for="user" class="col-sm-4 control-label">Usuario o Email</label>
                <div class="col-sm-8">
                  <input name="user" type="text" class="form-control" id="user">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">Contraseña</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputPassword3" name="password">
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-10">
                <button type="submit" class="button">Ingresar</button>
              </div>
            </div>
            <?php if($invalid==true){ ?>
                <div style="padding:10px;color:red;text-align:center;">Verifica la clave y/o el usuario que ingresaste</div>
            <?php } ?>
            <?php if($contactar===true){ ?>
                <div style="padding:10px;color:red;text-align:center;">Necesitas ingresar a tu cuenta para contactar al publicador</div>
            <?php } ?>
        </form>
    </div>
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
