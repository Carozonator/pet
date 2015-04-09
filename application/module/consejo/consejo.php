
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo htmlEncodeText($data['titulo']);?>
        </h2>
        <div style="padding-top:20px;">
            <div style="float:right;">
            </div>
            
            <span class="description" style="margin-top:20px;">
                <?php echo htmlEncodeText($data['descripcion']);?>
            </span>
            <div style="text-align:center;padding-top:30px;" >
                <div class="img_large">
                    <img style="" alt="<?php echo $anuncio['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name']; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
