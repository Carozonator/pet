<?php



$raza_o_animal = array('perro'=>'Raza','gato'=>'Raza','mamifero'=>'Animal','pez'=>'Animal','mamifero'=>'Animal','ave'=>'Animal','reptil'=>'Animal','otro'=>'Animal');
?>
<div style="margin-top:40px">
    <div class="publicar" style='min-height:0px;margin:0px 20px 0px 0px;width:20%;float:left;'>
        <form action="/anuncio/filtro/" method="GET" id="filter">
            <input type="hidden" value="<?php echo $anuncio_type; ?>" name="titulo"/>
            <div class="filter_title"><div class="publicar_item_header">Localizaci&oacute;n<span onclick="Filter.unfilter('departamento')">x</span></div></div>
            <div class="filter_desc">
                <select class="departamento" name="departamento" style="width:100%;">
                    <option></option>
                    <?php
                       $counter = 0;
                        foreach($GLOBALS['departamento'] as $key=>$r){
                            if($_REQUEST['departamento']==$key){
                                echo '<option selected>'.$key.'</option>';
                            }
                            else{
                                echo '<option value="'.$key.'">'.$key.'</option>';
                            }
                            $counter++;
                        }
                    ?>
                </select>
                <div style="width:100%;margin-top:5px;">
                    <select class="ciudad_barrio" name="ciudad_barrio" style="<?php if(empty($_REQUEST['departamento'])){echo 'display:none;';}?>width:100%;">
                        <option></option>
                        <?php
                       $counter = 0;
                        foreach($GLOBALS['departamento'][$_REQUEST['departamento']] as $r){
                            if($_REQUEST['ciudad_barrio']==$r){
                                echo '<option selected>'.$r.'</option>';
                            }
                            else{
                                echo '<option value="'.$r.'">'.$r.'</option>';
                            }
                            $counter++;
                        }
                    ?>
                    </select>
                </div>
                
            </div>
        </form>
    </div>
    <div style="width:75%;position:relative;float:right;margin-bottom:60px;min-height:700px;" class="img150 results">

<?php
if(empty($data)){
    echo '<div style="font-weigth:bold;text-align:center;font-size:15px;">No hay anuncios en esta categoria</div>';
}
else{
foreach($data as $row){
?>

        <div style="margin:40px;position:relative;"class="img150">
        <div style="float:left;margin-right:10px;" class="thumb">
            <a title="<?php echo $row['titulo'];?>" href="/anuncio/<?php echo $row['id'];?>">
                <img style="height:100%;" alt="<?php echo $row['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$row['foto_1']; ?>">
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

