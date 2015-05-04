
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo $anuncio['titulo'];?>
        </h2>
        <div style="display:inline-block;padding:20px 0px" class="single_item">
            <h2 style="padding-bottom:20px;"><?php echo strtoupper($anuncio['tab']);?></h2>
            <?php if(!empty($anuncio['fecha'])) { ?>
            <h5>Fecha:</h5>
            <span><?php echo ($anuncio['fecha']);?></span><br/>
            <?php } ?>
            <?php if(!empty($anuncio['horario'])) { ?>
            <h5>Horario:</h5>
            <span><?php echo ($anuncio['horario']);?></span><br/>
            <?php } ?>
            <h5>Direcc&iacute;on:</h5>
            <span ><?php echo (!empty($anuncio['direccion'])?ucfirst($anuncio['direccion']).', ':'');?><?php echo (!empty($anuncio['ciudad_barrio'])?ucfirst($anuncio['ciudad_barrio']).', ':'');?><?php echo (!empty($anuncio['departamento'])?ucfirst($anuncio['departamento']):'');?></span><br/>
        </div>
        <div style="margin-top:20px;">
            <h4 style="border-bottom: 1px solid grey;margin-bottom:10px;">Descripción</h4>
            <?php echo $anuncio['descripcion'];?>
        </div>
        
    </div>
    <div style="text-align: center;">
        <div class="img_box_xl" style="text-align:center;">
            <img style="" alt="<?php echo $anuncio['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name']; ?>">
        </div>
    </div>
</div>
<style>
    h5{
        display: inline-block;
        margin:5px;
    }
    h5 + span{
        font-size:14px;
    }
</style>






