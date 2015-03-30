
<div class="main-content_container" style="margin:30px auto;width:500px;">
    <div class="header">Modificar Clave</div>
    <form style="margin-top:10px;" method="POST" action="/account/nueva_contrasena/">
        <div style="width:400px;position:relative;border-bottom:1px solid lightgrey;">
            <div style="margin:20px">
                <label style="display:inline-block;width:100px">Nueva Clave : </label>
                <input style="width:200px" name="password" type="password">
            </div>
            <div style="margin:20px">
                <label style="display:inline-block;width:100px">Repetir Clave : </label>
                <input style="width:200px" name="password_repetir" type="password">
            </div>
            <input type="hidden" name="key" value="<?php echo $_GET['key']; ?>"/>
            <div style="position:absolute;right:-20px;top:10px;" onclick="$(this).closest('form').submit();" class="icon-circle-arrow-right submit_arrow"></div>
        </div>
    </form>
</div>
