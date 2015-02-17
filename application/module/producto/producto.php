
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo $producto['titulo'];?>
        </h2>
        <div style="float:right;">
        <?php 
            foreach($foto as $f){ ?>
                <div class="img_box_small" style="margin-right:10px;" class="img_box_small">
                    <a href="<?php echo MEDIA.'upload/'.$f['usuario'].'/'.$f['name']; ?>" data-lightbox="roadtrip" >
                        <img alt="<?php echo $producto['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$f['usuario'].'/thumb_'.$f['name']; ?>">
                    </a>
                </div>
            <?php } ?>
        </div>
        <div style="padding-top:20px;">
            <div class="img_box_xl" style="margin-right:20px;">
                <img alt="<?php echo $producto['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name']; ?>">
            </div>
            <div style="display:inline-block">
                <h2 style="padding-bottom:20px;"><?php echo strtoupper($producto['tab']);?></h2>
                <h5 >Direcc&iacute;on:</h5>
                <p class="gristxt"><?php echo ucfirst($producto['ciudad_barrio']);?>, <?php echo ucfirst($producto['departamento']);?></p><br/>
                <button onclick="Contactar.show(<?php echo $producto['usuario']; ?>)">Contactar</button>
                <?php if($_SESSION['user']->id==$producto['usuario']){ ?>
                    <form style="margin-top:20px;"method="GET" action="/mascota/editar/<?php echo $producto['id'];?>">
                        <input type="hidden" value="<?php echo $producto['tab'];?>" name="tab"/>
                        <input type="submit" value="Editar"/>
                    </form>
                <?php } ?>
            </div>
        </div>
            
            
        

        <div class="item_datos" style="margin-top:20px;">
            <h4>Datos</h4>
            
            Precio: $<?php echo ucfirst($producto['precio']);?><br/>
            <?php 
            if($producto['link']){
                echo '<a class="gristxt" title="" href="'.$producto['link'].'">'.$producto['link'].'</a>';
            }
            ?>
        </div>
        <div style="margin-top:20px;">
            <h4>Descripci&oacute;n</h4>
            <p class="descripcion"><?php echo $producto['descripcion'];?></p>
        </div>
    </div>
</div>
<script>
    function enlargeImage(elem){
        var src = $(elem).attr('src');
        $('.img_box_xl').find('img').attr('src',src);
    }
</script>
