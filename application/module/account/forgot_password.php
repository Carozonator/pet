
<div class="main-content_container" style="margin:30px auto;width:500px;">
    <div class="header">Ingresa email para recuperar contrase&ntilde;a</div>
    <form style="margin-top:10px;" method="POST" action="/account/recupere_contrasena/">
        <div style="width:400px;position:relative;border-bottom:1px solid lightgrey;">
            <div style="margin:20px">
                <label>Email: </label><input style="width:200px" name="email" type="text">
            </div>
            <div style="position:absolute;right:-20px;top:10px;" onclick="$(this).closest('form').submit();" class="icon-circle-arrow-right submit_arrow"></div>
        </div>
        <?php if($invalid_email==true){ ?>
            <div style="padding-top:10px;color:red;">No existe ninguna cuenta registrada con el email ingresado</div>
        <?php } ?>
    </form>
</div>
