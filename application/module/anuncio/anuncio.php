
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo $anuncio['titulo'];?>
        </h2>
        <div style="padding-top:20px;">
            <div class="img_box_xl" style="margin-right:20px;">
                <img onclick="" alt="<?php echo $anuncio['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$anuncio['foto_1']; ?>">
            </div>
            <div style="display:inline-block" class="single_item">
                <h2 style="padding-bottom:20px;"><?php echo strtoupper($anuncio['tab']);?></h2>
                <h5>Direcc&iacute;on:</h5>
                <p class="gristxt"><?php echo ucfirst($anuncio['direccion']);?><br/><?php echo ucfirst($anuncio['ciudad']);?>, <?php echo ucfirst($anuncio['departamento']);?></p><br/>
                <h5>Telefono:</h5>
                <p class="gristxt"><?php echo ucfirst($anuncio['telefono']);?></p><br/>
                <button onclick="Contactar.show(<?php echo $anuncio['usuario']; ?>)" style="">Contactar</button>
            </div>
            <div style="margin-top:20px;">
                <h4>Informaci&oacute;n de <?php echo $anuncio['titulo'];?></h4>
                <?php echo $anuncio['descripcion'];?>
            </div>
            <div style="margin-top:20px;">
                <h4>Horario</h4>
                <?php echo $anuncio['horario'];?><br/>
            </div>
        </div>
    </div>
</div>
