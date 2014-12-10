<?php 


$opcion = array('Vender'=>'comprar',
                'Poner en adopcion'=>'adoptar',
                'Perdido'=>'perdido',
                'Encontrado'=>'encontrado',
                'Cruzar'=>'cruzar');



?>
<style>
    .slides{
        background:white;
    }
</style>
<div class="publicar" style="overflow-x:hidden;overflow-y:hidden">
    <div class="publicar_header">
        <ol>
            <li class="step highlight"><a href="#" onclick="Publicar.slideRight(0,false);">Elige qu&eacute; publicar</a></li>
            <li class="publicar_header_arrow">&nbsp;</li>
            <li class="step"><a href="#" onclick="Publicar.slideRight(1,false);return false;">Eligue donde</a></li>
            <li class="publicar_header_arrow">&nbsp;</li>
            <li class="step"><a href="#">Describe tu servicio</a></li>
            <li class="publicar_header_arrow">&nbsp;</li>
            <li class="step" style="border-right:0;"><a href="#">Publicar</a></li>
        </ol>
    </div>
    <div id="pervious_arrow">
        
    </div>
    <div  id="publicar_slider" style="position:relative;width:100%;">
        <div class="slides donde" style="text-align: center;">
            <div  style="position:relative;padding:40px">
                <img onclick="Publicar.animal='perro';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_perro.jpg"/>
                <img onclick="Publicar.animal='gato';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_gato.jpg"/>
                <img onclick="Publicar.animal='ave';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_ave.jpg"/>
                <img onclick="Publicar.animal='reptil';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_reptil.jpg"/><br/>
                <img onclick="Publicar.animal='mamifero';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_pequenosmamiferos.jpg"/>
                <img onclick="Publicar.animal='pez';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_pez.jpg"/>
                <img onclick="Publicar.animal='otro';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_otros.jpg"/>
            </div>
        </div>
        <div class="slides tab" style="position:absolute;left:1000px;width:100%;">
                <div style="margin:20px;text-align:center">
                    <?php
                        $hide = array('vender');
                        foreach($opcion as $key=>$row){
                            /*
                            if(in_array($row,$hide)){
                                $hide='tab_hide';
                            }else{
                                $hide='';
                            }*/
                            echo '<div><a class="button tab_option tab_'.$row.'" style="line-height:40px;height:40px;width:200px;margin:10px;font-size:15px" href="#" onclick="Publicar.tab=\''.$row.'\';Publicar.slideRight(2,true);return false;">'.$key.'</a></div>';
                        }
                    ?>
                </div>
        </div>
        <div class="slides description" style="position:absolute;left:2000px;width:100%;">
           
        </div>
        
        <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
</div>
<div style="clear:both"></div>
<script>
    //Mascota = <?php echo mascota_json; ?>;
    Publicar.group="mascota";
    //$(".dz-message").append('<div>&#8677; Drop fotos o aprete aqui</div>');
    //$(".dropzone .dz-default.dz-message").css('background-image','');
</script>

