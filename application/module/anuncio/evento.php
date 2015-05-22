
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo $data['titulo'];?>
        </h2>
        <div style="display:inline-block;padding:20px 0px" class="single_item">
            <h2 style="padding-bottom:20px;"><?php echo strtoupper($data['tab']);?></h2>
            <?php if(!empty($data['fecha'])) { ?>
            <h5>Fecha:</h5>
            <span><?php echo ($data['fecha']);?></span><br/>
            <?php } ?>
            <?php if(!empty($data['horario'])) { ?>
            <h5>Horario:</h5>
            <span><?php echo ($data['horario']);?></span><br/>
            <?php } ?>
            <h5>Direcc&iacute;on:</h5>
            <span ><?php echo (!empty($data['direccion'])?ucfirst($data['direccion']).', ':'');?><?php echo (!empty($data['ciudad_barrio'])?ucfirst($data['ciudad_barrio']).', ':'');?><?php echo (!empty($data['departamento'])?ucfirst($data['departamento']):'');?></span><br/>
        </div>
        <div style="margin-top:20px;">
            <h4 style="border-bottom: 1px solid grey;margin-bottom:10px;">Descripción</h4>
            <?php echo $data['descripcion'];?>
        </div>
        
    </div>
    <div style="text-align: center;">
        <div class="img_box_xl" style="text-align:center;">
            <img style="" alt="<?php echo $data['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name']; ?>">
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






