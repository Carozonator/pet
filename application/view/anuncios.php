
<?php 

if(empty($data)){
    echo '<div style="text-align:center;font-size:13px;padding:20px">No hay anuncios en esta categoria</div>';
}
foreach($data as $row){
?>
    <div style="margin:40px;position:relative;"class="img150">
        <div style="float:left;margin-right:10px;" class="thumb">
            <a title="<?php echo $row['titulo'];?>" href="#"><img alt="<?php echo $row['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$row['foto_1']; ?>"></a>
        </div>
        <div class="overflow mbottom">
            <!--<div class="fright gristxt">1 voto <span class="excelente">10,00</span></div>-->
            <h3><a class="bigtxt" title="<?php echo $row['titulo'];?>" href="#"><?php echo $row['titulo'];?></a></h3>
            <p class="gristxt"><?php echo ucfirst($row['direccion']);?> - <?php echo ucfirst($row['ciudad']);?> - <?php echo ucfirst($row['departamento']);?></p>
            <?php 
            
            if($row['horario']){
                echo '<p class="gristxt nolink" title="" href="#">Horario: '.$row['horario'].'</p>';
            }
            if($row['link']){
                echo '<a class="gristxt" title="" href="'.$row['link'].'">'.$row['link'].'</a>';
            }
            ?>
            <p class="descripcion"><?php echo $row['descripcion'];?></p>
            <div style="position:absolute;right:0px;top:0px;">
                <!--
                <form style="display:inline;" method="POST" action="/anuncios/edit/">
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                    <button style="margin-left:10px;">Editar</button>
                </form>
                -->
                <form style="display:inline;" method="POST" action="/anuncios/delete/">
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                    <button style="margin-left:10px;">Borrar</button>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>
