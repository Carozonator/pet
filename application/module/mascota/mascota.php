
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;color:#9C2490">
            <?php echo $mascota['titulo'];?>
        </h2>
        <div style="float:right;">
        <?php 
            foreach($foto as $f){ ?>
            
                <div class="img_box_small" style="margin-right:10px;" class="img_box_small">
                    <a href="<?php echo MEDIA.'upload/'.$f['usuario'].'/'.$f['name']; ?>" data-lightbox="roadtrip" >
                        <img alt="<?php echo $mascota['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$f['usuario'].'/'.$f['name']; ?>">
                    </a>
                </div>
            <?php } ?>
        </div>
        <div style="padding-top:20px;">
            <div class="img_box_xl" style="margin-right:20px;">
                <img alt="<?php echo $mascota['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name']; ?>">
            </div>
            <div style="display:inline-block">
                <h2 style="padding-bottom:20px;">
                    <!--<?php echo strtoupper($mascota['tab']);?>-->
                </h2>
                <h5 >Direcc&iacute;on:</h5>
                <p class="gristxt"><?php echo ucfirst($mascota['ciudad_barrio']);?>, <?php echo ucfirst($mascota['departamento']);?></p><br/>
                <button onclick="Contactar.show(<?php echo $mascota['usuario']; ?>)">Contactar</button>
                <?php if($_SESSION['user']->id==$mascota['usuario']){ ?>
                    <form style="margin-top:20px;"method="GET" action="/mascota/editar/<?php echo $mascota['id'];?>">
                        <input type="hidden" value="<?php echo $mascota['tab'];?>" name="tab"/>
                        <input type="submit" value="Editar"/>
                    </form>
                <?php } ?>
            </div>
        </div>
            
            
        

        <div class="item_datos" style="margin-top:20px;">
            <h4 style="color:#9C2490">Datos</h4>
            <span class="gristxt_1"><?php echo $GLOBALS['raza_o_animal'][$mascota['animal']]; ?>:</span> <?php echo ucfirst($mascota['animal_detail']);?><br/>
            <span class="gristxt_1">Precio:</span> $<?php echo ucfirst($mascota['precio']);?><br/>
            <span class="gristxt_1">Tama&ntilde;o:</span>  <?php echo ucfirst($mascota['tamano']);?><br/>
            <span class="gristxt_1">Edad:</span> <?php echo ucfirst($mascota['edad']);?><br/>
            <span class="gristxt_1">Sexo:</span> <?php echo ucfirst($mascota['sexo']);?><br/>
            <span class="gristxt_1">Pedigree:</span> <?php echo ucfirst($mascota['pedigree']);?><br/>
            <span class="gristxt_1">Criadero:</span> <?php echo ucfirst($mascota['criadero']);?><br/>
            <?php 
            if($mascota['horario']){
                echo 'Horario: '.$mascota['horario'].'';
            }
            if($mascota['link']){
                echo '<a class="gristxt" title="" href="'.$mascota['link'].'">'.$mascota['link'].'</a>';
            }
            ?>
        </div>
        <div style="margin-top:20px;">
            <h4>Descripci&oacute;n</h4>
            <p class="descripcion"><?php echo $mascota['descripcion'];?></p>
        </div>
    </div>
</div>
<script>
    function enlargeImage(elem){
        var src = $(elem).attr('src');
        $('.img_box_xl').find('img').attr('src',src);
    }
</script>
