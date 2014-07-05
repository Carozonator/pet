<?php
$raza_o_animal = array('perro'=>'Raza','gato'=>'Raza','mamifero'=>'Animal','pez'=>'Animal','mamifero'=>'Animal','ave'=>'Animal','reptil'=>'Animal','otro'=>'Animal');

if(empty($data)){
    echo '<div style="text-align:center;font-size:13px;padding:20px">No hay anuncios en esta categoria</div>';
}
foreach($data as $row){
?>
    <div style="margin:40px;position:relative;"class="img150">
        <div style="float:left;margin-right:10px;" class="thumb">
            <a title="<?php echo $row['titulo'];?>" href="/anuncio/<?php echo $row['id'];?>">
                <img alt="<?php echo $row['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$row['foto_1']; ?>">
            </a>
        </div>
        <div class="overflow mbottom">
            <!--<div class="fright gristxt">1 voto <span class="excelente">10,00</span></div>-->
            <h3>
                <a class="bigtxt" href="#"><?php echo $row['titulo'];?></a>
            </h3>
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
                <!--<form style="display:inline;" method="POST" action="/comprar/delete/">
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                    <button style="margin-left:10px;">Borrar</button>
                </form>-->
            </div>
        </div>
    </div>
<?php
}
?>
