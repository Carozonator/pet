
<div class="main-content_container" style="margin:30px auto;width:500px;">
    <div class="header">Ingresa para poder publicar</div>
    <form style="margin-top:10px;" method="POST" action="/account/login/">
        <div style="width:400px;text-align:right;position:relative;border-bottom:1px solid lightgrey;">
            <div style="margin:20px">
                <label>Usuario: </label><input style="width:200px" name="user" type="text">
            </div>
            <div style="margin:20px">
                <label>Password: </label><input style="width:200px" name="password" type="text">
            </div>
            <div style="position:absolute;right:-20px;top:36px;" onclick="$(this).closest('form').submit();" class="icon-circle-arrow-right submit_arrow"></div>
        </div>
    </form>
    <div style="font-size:15px;margin-top:20px;">
        <a href="#" onclick="Register.open()">No estas registrado?</a>
    </div>
</div>
