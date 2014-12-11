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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/jquery_ui/js/jquery_ui.js"></script> 
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/select2/select2.js"></script> 
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/select2/select2_locale_es.js"></script> 
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>vendor/dropzone/dropzone.js"></script>
    <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>js/main.js"/></script>
    <script type="text/javascript">
            $(document).ready(function(){
                    $('.dropdown-menu').click(function() {
                        $('.dropdown').hide();
                        $(this).find('.dropdown').show();
                        $('.wrapper-dropdown-5').addClass('active');
                    });
             });
            
    </script>
</head>
<body>
<div>
    
    <div class="container_12">
        <a href="/"><img src="<?php echo MEDIA; ?>logo.png" style="width:200px;height:auto;" alt=""></a>
        <div class="wrapper-dropdown-5 user_controls" style="">
                    <?php if(!isset($_SESSION['user'])) { ?>
                    <div id="dd" style="" class="dropdown-menu" tabindex="1"><i class="icon-user"></i> Ingresa
                        <ul style=""class="dropdown">
                            <form style="margin-top:10px;" method="POST" action="/account/login/">
                                <input type="hidden" name="action" value="login"/>
                                <li><i class="icon-envelope"></i><input name="user" placeholder="Email o Usuario" type="text"/>
                                <i class="icon-lock"></i><input name="password" placeholder="Password" type="password"/>
                                <div onclick="$(this).closest('form').submit();" class="icon-circle-arrow-right"></div></li>
                                <input type="submit" style="position: absolute; left: -9999px"/>
                            </form>
                            <li><a href="#"></i>Has olvidado tu contrase&ntilde;a?</a></li>
                        </ul>
                    </div>
                    <div style="" class="dropdown-menu" tabindex="1"><a href="#" onclick="Register.open();return false;"><i class="icon-pencil"></i> Registrate</a>
                    </div>

                    <?php }else{ ?>
                    <div id="dd" style="min-width:100px;" class="dropdown-menu" tabindex="1"><i class="icon-user"></i> <?php echo $_SESSION['user']->username;?>
                        <ul class="dropdown">
                            <li><a href="/account/"><i class="icon-user"></i>Mi cuenta</a></li>
                            <!--<li><a href="#"><i class="icon-cog"></i>Settings</a></li>-->
                            <li><a href="/account/logout"><i class="icon-remove"></i>Salir</a></li>
                        </ul>
                    </div>
                    <?php } ?>
            
                        
                    <!--<div style="" class="dropdown-menu" tabindex="1"><i class="icon-shopping-cart"></i> Carrito</div>-->
                    <div style="float:right">
                        <!--<input style="background-color:none;height:22px;" type="text" value="" name="s"  placeholder="Buscar por productos">
                        <i class="icon-search"></i>
                        -->
                    </div>
        </div>
    </div>
    <div id="top" style="width:100%;z-index:1">
  
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
                        echo "<li class='$class'><a href='#'>".ucfirst($k1)."</a>";
                        $k1=  str_replace(' ', '-', $k1);
                        echo '<ul class="sub-menu">';
                        foreach($r1 as $k2 => $r2){
                            foreach($r2 as $k3=>$r3){
                                echo "<li><a href='/$k1/$k3/'>".$r3."</a></li>";
                            }
                        }
                        echo '</ul></li>';
                    }
                    ?>
                </ul> -->
                <ul id="menu-main" class="menu" style="text-align:center;">
                    <?php 
                    foreach($GLOBALS['nav_menu'] as $k1 => $r1){
                        $class = (strcasecmp($tab,$k1)===0?'nav-current-module':'');
                        if(count($r1)==0){
                            echo "<li style='display:inline-block;float:none;' class='$class'><a href='/$k1'>".ucfirst($k1)."</a></li>";
                            continue;
                        }
                        echo "<li style='display:inline-block;float:none;' class='$class'><a href='#'>".ucfirst($k1)."</a>";
                        $k1=  str_replace(' ', '-', $k1);
                        //echo '<div style="display:inline-block;margin-left:50%;">';
                        echo '<ul class="sub-menu">';
                        foreach($r1 as $k2 => $r2){
                            foreach($r2 as $k3=>$r3){
                                echo "<li style='margin-left:-112px'><a href='/$k1/$k3/'>".$r3."</a></li>";
                            }
                        }
                        echo '</ul></li>';
                    }
                    ?>
                </ul> 
                <div style="clear:both;float:none;"></div>
            </nav>
        </div>
    </div>
    <div class="clear"></div>
</div>
    <div class="container_12">
