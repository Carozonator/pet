<?php



$raza_o_animal = array('perro'=>'Raza','gato'=>'Raza','mamifero'=>'Animal','pez'=>'Animal','mamifero'=>'Animal','ave'=>'Animal','reptil'=>'Animal','otro'=>'Animal');
?>
<div style="margin-top:40px">
    
    <div style="margin-bottom:60px;min-height:700px;" class="img150 results">

<?php
if(empty($data)){
    echo '<div style="font-weigth:bold;text-align:center;font-size:15px;">No hay consejos en esta categoria</div>';
}
else{
foreach($data as $row){
?>

        <div style="margin:40px;position:relative;"class="img150">
        <div style="float:left;margin-right:10px;" class="thumb">
            <a title="<?php echo $row['titulo'];?>" href="/consejo/<?php echo $row['id'];?>">
                <img style="height:100%;" alt="<?php echo $row['foto_name'];?>" src="<?php echo MEDIA.'upload/'.$row['foto_usuario'].'/'.$row['foto_name']; ?>">
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
}
echo '</div>';
echo '<div style="clear:both"></div>';
echo '</div>';
?>

