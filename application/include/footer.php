</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<footer>
    
    <div class="f_navigation_container">
    <div class="f_navigation">
        <div class="container_12">
            <div class="grid_3">
                <nav class="f_menu">
                    <h3>Contacto</h3>
                    <div class="menu-information-container">
                        <ul class="">
                            <li><a href="/informacion/contacto-empresarial/">Contacto Empresarial</a></li>
                            <li><a href="/informacion/sugerencias/">Sugerencia</a></li>
                        </ul><!-- .f_contact -->
                    </div>
                </nav>
            </div><!-- .grid_3 -->
            <div class="grid_3">
                <nav class="f_menu">
                    <h3>Informaci&oacute;n</h3>
                    <div class="menu-information-container">
                        <ul id="menu-information" class="menu">
                            <li id="menu-item-45" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-45"><a href="/informacion/sobre-nosotros/">Sobre Nosotros</a></li>
                            <li id="menu-item-46" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-46"><a href="/informacion/terminos-y-condiciones/">T&eacute;rminos y Condiciones</a></li>
                        </ul>
                    </div>                
                </nav>
            </div>
            <!--
            <div class="grid_3">
                <nav class="f_menu">
                    <h3>Costumer Servise</h3>
                    <div class="menu-costumer-servise-container">
                        <ul id="menu-costumer-servise" class="menu">
                            <li id="menu-item-41" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41"><a href="http://#">Contact</a></li>
                            <li id="menu-item-42" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-42"><a href="http://#">Return</a></li>
                            <li id="menu-item-43" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-43"><a href="http://#">FAQ</a></li>
                            <li id="menu-item-44" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-44"><a href="http://#">Site Map</a></li>
                        </ul>
                    </div>                
                </nav>
            </div>
            -->
            <div class="grid_3">
                <nav class="f_menu">
                    <h3>Mi Cuenta</h3>
                    <div class="menu-my-account-container">
                        <ul id="menu-my-account" class="menu">
                            <li id="menu-item-49" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-49"><a href="/account/">Mi cuenta</a></li>
                            <!--<li id="menu-item-53" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53"><a href="/account/">Favoritos</a></li>-->
                        </ul>
                    </div>                
                </nav><!-- .f_menu -->
            </div><!-- .grid_3 -->
            <div class="grid_3" style="margin-top:-42px;">
                
                <div class="fb-like-box" data-width="235" data-href="https://www.facebook.com/FacebookDevelopers" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                
                
                <!--<div data-width="240" data-colorscheme="dark" class="fb-like-box" data-href="https://www.facebook.com/HowIMetYourMotherCBS" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>-->
            </div>
            <div class="clear"></div>
        </div><!-- .container_12 -->
    </div><!-- .f_navigation -->
    </div>
    <!--
    <div class="f_info">
        <div class="container_12">
            <div class="grid_6">
                <p class="copyright">PluralPet.com</p>
            </div>
            <div class="grid_6">
                <div class="soc">
                    <a class="google" href="#"></a>
                    <a class="twitter" href="#"></a>
                    <a class="facebook" href="#"></a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>-->
</footer>
<?php include ROOT.'application/include/registracion.php'; ?>
<div id="empty_box" class="overlay_box"><div class="overlay_box_inner"></div><div class="overlay_close" onclick="closeOverlay();">X</div></div>
<div class="overlay" onclick="closeOverlay();"></div>
<div id="popup_registracion" class="overlay_box">
    <img src="/media/popup.jpg"/>
    <div style="position:absolute;bottom:0px;left:0px;width:540px;height:40px;cursor:pointer" onclick="window.location='/informacion/terminos-y-condiciones/'"></div>
    <div style="position:absolute;bottom:0px;right:0px;width:200px;height:40px;cursor:pointer" onclick="closeOverlay();"></div>
    <div style="position:absolute;top:290px;left:330px;width:50px;height:20px;cursor:pointer;" onclick="$('#popup_registracion').hide();Register.open();"></div>
</div>
</body>
</html>