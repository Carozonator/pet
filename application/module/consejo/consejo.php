
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo $data['titulo'];?>
        </h2>
        <div style="padding-top:20px;">
            <div style="float:right;">
            </div>
            <div class="img_box_xl" style="margin-right:20px;float:left">
                <img onclick="" alt="<?php echo $data['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name']; ?>">
            </div>
            <div style="margin-top:20px;float:left;">
                <?php echo $data['descripcion'];?>
            </div>
        </div>
    </div>
</div>
