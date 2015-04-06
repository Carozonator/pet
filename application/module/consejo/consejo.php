
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo htmlEncodeText($data['titulo']);?>
        </h2>
        <div style="padding-top:20px;">
            <div style="float:right;">
            </div>
            <div class="img_box_small" style="margin-right:10px;" class="img_box_small">
                <a href="<?php echo MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name']; ?>" data-lightbox="roadtrip" >
                    <img alt="<?php echo $anuncio['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name']; ?>">
                </a>
            </div>
            <div style="margin-top:20px;float:left;">
                <?php echo htmlEncodeText($data['descripcion']);?>
            </div>
        </div>
    </div>
</div>
