<!DOCTYPE>

<html lang="es-ES">
<head>
    <link href="<?php echo MEDIA; ?>favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>css/breeze.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>/vendor/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>vendor/CustomDropDown/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>vendor/jquery_ui/css/custom-theme/jquery_ui.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>vendor/dropzone/css/dropzone.css"/>
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/CustomDropDown/js/modernizr.custom.79639.js"></script> 
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/nicEdit/nicEdit.js"></script> 
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/jquery_ui/js/jquery_ui.js"></script> 
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/select2/select2.js"></script> 
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/select2/select2_locale_es.js"></script> 
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/dropzone/dropzone.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>js/main.js"/></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/slider-master/js/jssor.slider.mini.js"/></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/tinymce/tinymce.min.js"></script>
    <script src="<?php echo PUBLIC_PATH; ?>vendor/lightbox/js/lightbox.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>vendor/lightbox/css/lightbox.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php echo $head_tags; ?>
    
    <script src=""></script>
    <script type="text/javascript">
            $(document).ready(function(){
                
                    Publicar.user_logged_in = <?php echo (isset($_SESSION['user'])?'true':'false'); ?>;
                    var visit=getCookie("FIRST_VISIT");
                    
                    
                    if(Publicar.user_logged_in==false && window.location.pathname=='/' && typeof visit=='undefined'){
                        Register.popup();
                    }
                    
                    if(typeof visit=='undefined' &&  window.location.pathname=='/'){
                        var expire=new Date();
                        expire=new Date(expire.getTime()+7776000000);
                        document.cookie="FIRST_VISIT=true; expires="+expire;
                    }
                    
                    $('.dropdown-menu').click(function(event) {
                        event.stopPropagation();
                        $('.dropdown').hide();
                        $(this).find('.dropdown').show();
                        $('.wrapper-dropdown-5').addClass('active');
                    });
                    $('body').click(function(){
                        $('.wrapper-dropdown-5').removeClass('active');
                    })
             });
            
    </script>
    <?php include(ROOT.'application/include/analytics_tracking.php'); ?>
</head>
<body>
    <div class="container_12">
        <a href="/"><img src="<?php echo MEDIA; ?>logo.png" style="width:200px;height:auto;" alt=""></a>
        <div class="wrapper-dropdown-5 user_controls" style="">
                    <?php if(!isset($_SESSION['user'])) { ?>
                    <div id="dd" style="" class="dropdown-menu" tabindex="1"><i class="icon-user"></i> Ingresa
                        <ul style=""class="dropdown">
                            <form style="margin-top:10px;" method="POST" action="/account/login/">
                                <input type="hidden" name="action" value="login"/>
                                <li>
                                    <i class="icon-envelope"></i>
                                    <input name="user" placeholder="Email o Usuario" type="text"/>
                                </li>
                                <li>
                                    <i class="icon-lock"></i>
                                    <input name="password" placeholder="Password" type="password"/>
                                <div onclick="$(this).closest('form').submit();" class="icon-circle-arrow-right"></div>
                                </li>
                                <input type="submit" style="position: absolute; left: -9999px"/>
                            </form>
                            <li><a href="/account/recupere_contrasena/"></i>Has olvidado tu contrase&ntilde;a?</a></li>
                        </ul>
                    </div>
                    <div style="" class="dropdown-menu" tabindex="1"><a href="#" onclick="Register.open();return false;"><i class="icon-pencil"></i> Registrarme</a>
                    </div>

                    <?php }else{ ?>
                    <div id="dd" style="min-width:50px;" class="dropdown-menu" tabindex="1">
                        <a href="/account/"><i class="icon-user"></i> <?php echo $_SESSION['user']->username;?></a>
                        <a style="padding-left:20px;" href="/account/logout"><i style="padding-right:5px;" class="icon-eject"></i>Salir</a>
                        <!--
                        <ul class="dropdown">
                            <li><a href="/account/"><i class="icon-user"></i>Mi cuenta</a></li>
                            <li><a href="/account/logout"><i class="icon-remove"></i>Salir</a></li>
                        </ul>
                        -->
                    </div>
                    <?php } ?>
            
                        
                    <!--<div style="" class="dropdown-menu" tabindex="1"><i class="icon-shopping-cart"></i> Carrito</div>
                    <div style="float:right">
                        <input style="background-color:none;height:22px;" type="text" value="" name="s"  placeholder="Buscar por productos">
                        <i class="icon-search"></i>
                    </div>-->
                    
        </div>
    </div>
    <div id="top" style="width:100%;">
  
        <div class="container_12">
            <nav class="primary">
                <a class="menu-select" href="#">Catalog</a>
                <!--
                <ul id="menu-main" class="menu">
                    <?php 
                    foreach($GLOBALS['nav_menu'] as $k1 => $r1){
                        $class = (strcasecmp($tab,$k1)===0?'nav-current-module':'');
                        if(count($r1)==0){
                            echo "<li class='$class'><a href='/$k1'>".ucfirst($k1)."</a></li>";
                            continue;
                        }
                        if(strcmp($k1,'consejo')===0){
                            echo "<li class='$class'><a href='/consejo'>".ucfirst($k1)."</a>";
                        }else{
                            echo "<li class='$class'><a href='#'>".ucfirst($k1)."</a>";
                        }
                        $k1=  str_replace(' ', '-', $k1);
                        echo '<ul class="sub-menu">';
                        foreach($r1 as $k2 => $r2){
                            foreach($r2 as $k3=>$r3){
                                if(strcmp($k1,'mascota')){
                                    echo "<li><a href='/comprar/$k3/'>".$r3."</a></li>";
                                }else{
                                    echo "<li><a href='/$k1/$k3/'>".$r3."</a></li>";
                                }
                            }
                        }
                        echo '</ul></li>';
                    }
                    ?>
                </ul> -->
                <ul id="menu-main" class="menu" style="text-align:center;">
                    <?php 
                    foreach($GLOBALS['nav_menu'] as $k1 => $r1){
                            /*
                            $class = (strcasecmp($tab,$k1)===0?'nav-current-module':'');
                            if(count($r1)==0){
                                echo "<li style='display:inline-block;float:none;' class='$class'><a href='/$k1'>".ucfirst($r1['name'])."</a></li>";
                                continue;
                            }
                            */

                            if(strcmp($k1,'consejo')===0){
                                echo "<li style='display:inline-block;float:none;' class='$class'><a href='/consejo/'>".ucfirst($r1['name'])."</a>";
                            }else{
                                echo "<li style='display:inline-block;float:none;' class='$class'><a href='#'>".ucfirst($r1['name'])."</a>";
                            }


                            $k1=  str_replace(' ', '-', $k1);
                            echo '<ul class="sub-menu">';
                            foreach($r1['sub_menus'] as $sub_menu){
                                foreach($sub_menu as $k3=>$r3){
                                    if(strcmp($k1,'mascota')===0){
                                        echo "<li style='margin-left:-112px'><a href='/comprar/$k3/'>".$r3."</a></li>";
                                    }else{
                                        echo "<li style='margin-left:-112px'><a href='/$k1/$k3/'>".$r3."</a></li>";
                                    }
                                }

                            }
                        echo '</ul>';
                        echo '</li>';
                    }
                    ?>
                </ul> 
                <div style="clear:both;float:none;"></div>
            </nav>
        </div>
    </div>
    <div class="clear"></div>
    <div class="container_12">
