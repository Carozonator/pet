<?php



$raza_o_animal = array('perro'=>'Raza','gato'=>'Raza','mamifero'=>'Animal','pez'=>'Animal','mamifero'=>'Animal','ave'=>'Animal','reptil'=>'Animal','otro'=>'Animal');
?>
<div class="main-content_container consejo" style="margin:40px 0px;padding:0px;">
    

<?php
if(empty($data)){
    echo '<div style="font-weigth:bold;text-align:center;font-size:15px;">No hay consejos en esta categoria</div>';
}
else{
$counter=0;
foreach($data as $row){
    $counter++;
    $last_child = (count($data)==$counter?'border:none':'');
?>
    
    <div class="consejo_item img150" style="<?php echo $last_child; ?>">
        <div style="float:left;margin-right:10px;" class="thumb">
            <a title="<?php echo $row['titulo'];?>" href="/consejo/<?php echo $row['id'];?>">
                <img style="height:100%;" alt="<?php echo $row['foto_name'];?>" src="<?php echo MEDIA.'upload/'.$row['foto_usuario'].'/thumb_'.$row['foto_name']; ?>">
            </a>
        </div>
        <div class="overflow mbottom">
            <!--<div class="fright gristxt">1 voto <span class="excelente">10,00</span></div>-->
            <h3>
                <a class="bigtxt" href="/consejo/<?php echo $row['id'];?>" style="color:#9C2490"><?php echo htmlEncodeText($row['titulo']); ?></a>
            </h3>
            <?php 
            
            if($row['horario']){
                echo '<p class="gristxt nolink" title="" href="#">Horario: '.$row['horario'].'</p>';
            }
            if($row['link']){
                echo '<a class="gristxt" title="" href="'.$row['link'].'">'.$row['link'].'</a>';
            }
            ?>
            <p class="descripcion" style="font-size:14px;"><?php echo substrText($row['descripcion'],400); ?></p>
        </div>
    </div>
<?php
}
}
echo '<div style="clear:both"></div>';
echo '</div>';
?>

