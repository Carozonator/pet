

<div class="main-content_container">
    <div class="account">
        <div style="font-size:20px;margin-bottom:40px;">Resumen</div>
        <div class="wrapper">
            <div class="header">
                <i class="icon-comment"></i>
                Preguntas
            </div>
            <ul class="items">
                <li>Que aun no respondiste</li>
            </ul>
        </div>
        <div class="wrapper">
            <div class="header">
                <i class="icon-bar-chart"></i>
                Publicaciones
            </div>
            <ul class="items">
                <li><a href="/account/publicados/?status=activo"><?php echo $publicaciones['activo'];?> Activas</a></li>
                <li><a href="/account/publicados/?status=pausado"><?php echo $publicaciones['pausado'];?> Pausadas</a></li>
                <li><a href="/account/publicados/?status=finalizado"><?php echo $publicaciones['finalizado'];?> Finalizadas</a></li>
            </ul>
        </div>
        <div class="wrapper">
            <div class="header">
                <i class="icon-shopping-cart"></i>
                Operaciones
            </div>
            <ul class="items">
                <li>Compras</li>
                <li>Ventas</li>
            </ul>
        </div>
        <div class="wrapper">
            <div class="header">
                <i class="icon-adjust"></i>
                Datos Personales
            </div>
            <ul class="items">
                <li onclick="UpdateUser.selectField(this,'username')"><div class="item_user_align">Usuario</div><div class="item_user_align"><?php echo $user->username;?></div></li>
                <li onclick="UpdateUser.selectField(this,'password')"><div class="item_user_align">Clave</div><div class="item_user_align">*****</div></li>
                <li onclick="UpdateUser.selectField(this,'email')"><div class="item_user_align">Email</div><div class="item_user_align"><?php echo $user->email;?></div></li>
                <li onclick="UpdateUser.selectField(this,'phone')"><div class="item_user_align">Tel&eacute;fono</div><div class="item_user_align"><?php echo $user->phone;?></div></li>
                <li onclick="UpdateUser.selectField(this,'document')"><div class="item_user_align">Documento</div><div class="item_user_align"><?php echo $user->document;?></div></li>
            </ul>
        </div>
    </div>
</div>
<div style="display:none" class="update_user">
    <form action="/account/updateUser/" method="POST">
        <div style="font-size:16px;padding-bottom:20px;">Modificar</div>
        <span></span>&nbsp;
        <input name="value" type="text" value=""/>&nbsp;
        <input name="column" type="hidden" value=""/>&nbsp;
        <button class="button">Guardar</button>
    </form>
</div>
<style>
    .item_user_align{
        width:100px;
        display:inline-block;
    }
</style>
