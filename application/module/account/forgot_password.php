
<div class="main-content_container message_container">
    <div class="header">Ingresa email para recuperar contrase&ntilde;a</div>
    
    <form class="form-horizontal" method="POST" action="/account/recupere_contrasena/">
        <div class="form-group">
            <label for="user" class="col-sm-4 control-label">Email</label>
            <div class="col-sm-8">
              <input name="email" type="text" class="form-control" id="user">
            </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-10">
            <button type="submit" class="button">Enviar</button>
          </div>
        </div>
        <?php if($invalid_email==true){ ?>
            <div style="padding:10px;color:red;">No existe ninguna cuenta registrada con el email ingresado</div>
        <?php } ?>
    </form>
    
</div>
