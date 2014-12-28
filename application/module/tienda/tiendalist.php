
<?php 
$raza_o_animal = array('perro'=>'Raza','gato'=>'Raza','mamifero'=>'Animal','pez'=>'Animal','mamifero'=>'Animal','ave'=>'Animal','reptil'=>'Animal','otro'=>'Animal');







?>
<div style="margin-top:40px">
    <div class="publicar" style='margin:0px 20px 0px 0px;width:20%;float:left;'>
        <form action="/tienda/filtro/" method="GET" id="filter">
            <!--<input type="hidden" value="<?php echo $animal; ?>" name="animal"/>
            <input type="hidden" value="<?php echo $tab; ?>" name="tab"/>-->
            <div class="filter_title"><div class="publicar_item_header"><?php echo 'Animal'; ?><!--<span onclick="Filter.unfilter('animal')">x</span>--></div></div>
            <div class="filter_desc">
                <select class="animal" name="animal" style="width:100%;">
                    <option></option>
                    <?php
                        foreach($GLOBALS['nav_menu']['comprar'] as $r){
                            foreach($r as $key=>$other){
                                if($_REQUEST['animal']==$key){
                                    echo '<option value="'.$key.'" selected>'.ucfirst($key).'</option>';
                                }
                                else{
                                    echo '<option value="'.$key.'">'.ucfirst($key).'</option>';
                                }
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="filter_title" style="<?php if(empty($_REQUEST['animal'])){echo 'display:none;';}?>">
                <div class="publicar_item_header producto"><?php echo 'Producto'; ?><!--<span onclick="Filter.unfilter('tab')">x</span>--></div>
            </div>
            <div class="filter_desc producto" style="<?php if(empty($_REQUEST['animal'])){echo 'display:none;';}?>">
                <select class="tab" name="tab" style="width:100%;">
                    <option></option>
                    <?php
                        foreach($GLOBALS['producto'][$_REQUEST['animal']] as $key=>$r){
                            if($_REQUEST['tab']==$r){
                                echo '<option value="'.$r.'" selected>'.ucfirst($r).'</option>';
                            }
                            else{
                                echo '<option value="'.$r.'">'.ucfirst($r).'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            
            
            
            
            
            
            
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
    <div style="width:75%;position:relative;float:right;margin-bottom:60px;min-height:500px;" class="img150 results">

<?php
if(empty($data)){
    echo '<div style="font-weigth:bold;text-align:center;font-size:15px;">No hay productos en esta categoria</div>';
}
else{
foreach($data as $row){
?>

        <div style="margin-bottom: 30px;position:relative;min-height:160px;">
        <div style="float:left;margin-right:10px;" class="thumb">
            <a title="<?php echo $row['titulo'];?>" href="/tienda/<?php echo $row['id'];?>" >
                <img alt="<?php echo $row['nombre_original'];?>" style="width:100%;height:100%;" src="<?php echo MEDIA.'upload/'.$row['foto_usuario'].'/'.$row['foto_name']; ?>">
            </a>
        </div>
        <div class="overflow mbottom">
            <!--<div class="fright gristxt">1 voto <span class="excelente">10,00</span></div>-->
            <h3>
                <a class="bigtxt" href="/producto/<?php echo $row['id'];?>"><?php echo $row['titulo'];?></a>
            </h3>
            <p class="gristxt">Precio: <?php echo ucfirst($row['precio']);?></p>
            <p class="gristxt">Localizacion: <?php echo ucfirst($row['ciudad_barrio']);?>, <?php echo ucfirst($row['departamento']);?></p>
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
                 <form style="display:inline;" method="POST" action="/producto/delete/">
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                    <!--<button style="margin-left:10px;">Borrar</button>-->
                </form>
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