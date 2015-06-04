<?php 
/*
 * Used in ajax call
 */
$animal = $data['animal'];



$dir = ROOT.MEDIA."/tienda";
$files = scandir($dir);
$images = array();
foreach($files as $row){
    if($row =='.' || $row=='..' || $row=='.DS_Store'){
        continue;
    }
    $dir = ROOT.MEDIA."/tienda/".$row;
    $images[$row] = scandir($dir);
}
$tab = array();
foreach($images[$_REQUEST['tab']] as $key => $row){
    if(substr($r,0,1)!='.'){
        $t = array_shift(explode('.', $row));
        if(!empty($t)){
            $tab[]= $t;
        }
    }
}


?>
<div class="publicar" style="overflow-x:hidden;overflow-y:hidden">
    <div class="publicar_header">
        <ol style="text-align:center;">
            <li class="ch-wizard-step" style="display:inline-block;margin-left:-100px;float:none;">Editar</li>
        </ol>
    </div>
    <div  id="publicar_slider" style="position:relative;width:100%;">
        <div class="slides description editar_fotos" style="width:100%;">
            <div style="position:relative;padding:40px;position:relative;">
            <div class="publicar_item" style="position:relative">
                <ul class="sortable_photo" id="photo_order">
                <?php foreach($foto as $f){ ?>
                    <li class="img_li" id="<?php echo $f['id']; ?>" data-foto-order="<?php echo $f['photo_order']; ?>" >
                        <img style="cursor:move;" alt="<?php echo $data['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$f['usuario'].'/thumb_'.$f['name']; ?>">
                        <div class="photo_delete" onclick="Foto.remove(<?php echo $f['id']; ?>)">x</div>
                    </li>
                <?php } ?>
                <?php if(count($foto)<6){ ?>
                    <li class="unsortable">
                        <form id="fotos" action="/publicar/addPhotoEditar/" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="publication_id" value="<?php echo $id;?>"/>
                            <input type="hidden" name="table" value="producto"/>
                            <!--<input type="hidden" name="tab" value="<?php echo $_REQUEST['tab'];?>"/>-->
                            <input type="file" id="selectedFile" name="file" style="display: none;" />
                            <input id="submit_photo" type="submit" value="" onclick="" />
                        </form>
                        <!--
                        <form action="/publicar/adddddPhoto/" method="post" class="dropzone" id="fotos" enctype="multipart/form-data">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                            <input type="hidden" name="table" value="mascota"/>
                            <input type="hidden" name="publication_hash" value="<?php echo $publication_hash; ?>" id="publication_id"/>
                        </form>
                        -->
                    </li>
                <?php } ?>
                </ul>
            </div>
            <div style="clear:both"></div>
            <form action="/publicar/updateProducto/" method="post" id="form_description" enctype="multipart/form-data">
                
                    <input type="hidden" id="publication_id" name="publication_id" value="<?php echo $id;?>"/>
                    <input type="hidden" name="animal" value="<?php echo $animal;?>"/>
                    <div class="publicar_item">
                        <div class="publicar_item_header">Mascota</div>
                        <div class="publicar_sub_item">
                            <select class="tab_select" name="tab_select" style="width:200px;">
                                <?php foreach($GLOBALS['producto'] as $key=>$row){ 
                                    
                                    if(strcmp($key,$_REQUEST['tab'])===0){
                                        echo '<option value="'.$key.'" selected>'.$row.'</option>';
                                    }else{
                                        echo '<option value="'.$key.'">'.$row.'</option>';
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="publicar_item">
                        <div class="publicar_item_header">Tipo</div>
                        <div class="publicar_sub_item">
                            <select class="animal_detail" name="tab_tipo" style="width:200px;">
                                <?php
                                    foreach($tab as $row){
                                        $selected='';
                                        if(strcmp($row,($data['tab']))===0){
                                            $selected = 'selected';
                                        }
                                        echo '<option '.$selected.'>'.$row.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="publicar_item">
                        <div class="publicar_item_header">Ubicacion y Contacto</div>
                        <div class="publicar_sub_item">
                            <div style="height:45px;width:100%">
                                <label>Departamento </label>
                                <select class="departamento" name="departamento" style="margin-left:-4px;width:300px;">
                                    <option></option>
                                    <?php
                                       $counter = 0;
                                        foreach($GLOBALS['departamento'] as $key=>$row){
                                            $selected='';
                                            if($key==$data['departamento']){
                                                $selected = 'selected';
                                            }
                                            echo '<option '.$selected.' value="'.$key.'">'.$key.'</option>';
                                            $counter++;
                                        }
                                    ?>
                                </select><br/>
                            </div>
                            <div style="height:45px;width:100%">
                                <label>Ciudad/Barrio</label>
                                <select class="ciudad_barrio" name="ciudad_barrio" style="margin-left:-4px;width:300px;">
                                    <?php 
                                    if($data['ciudad_barrio']!=''){
                                        echo '<option value="'.$data['ciudad_barrio'].'">'.$data['ciudad_barrio'].'<option>';
                                    }else{
                                        echo '<option></option>';
                                    }
                                    ?>
                                    
                                </select><br/>
                            </div>

                        </div>
                    </div>
                    <div class="publicar_item">
                        <div class="publicar_item_header">Describe tu producto</div>
                        <div class="publicar_sub_item">
                            <label>Precio</label><input name="precio" type="text" value="<?php echo $data['precio']; ?>"/><span class="input_error"></span>
                        </div>
                        <div class="publicar_sub_item">
                            <label>Titulo</label><input name="titulo" type="text" value="<?php echo $data['titulo']; ?>"/><span class="input_error"></span>
                        </div>
                        <div class="publicar_sub_item">
                            <label>Producto ID</label><input name="vendedor_id" placeholder="" type="text" value="<?php echo $data['vendedor_id']; ?>"/><span class="input_error"></span>
                        </div>
                        <div class="publicar_sub_item">
                            <div>
                                <label style="margin-bottom:10px;">Descripcion</label><br/>
                                <div style="position:relative;margin-left:-3px;vertical-align: middle;display:inline-block;width:100%;">
                                    <textarea id="nicedit_text" style="width:100%;height:250px;"><?php echo htmlEncodeText($data['descripcion']); ?></textarea>
                                    <span style="position:absolute;top:0px;right:0px;" class="input_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <button onclick="Publicar.submit(this,'updateProducto');return false;">Guardar</button>
                    </div>
                    <div class="publication_error">
                        * Falta completar campos obligatorios
                    </div>
                </div>
                <div style="clear:both"></div>
            </form>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
</div>
<div style="clear:both"></div>
<script>
    
    Ready.initEdit('<?php echo $data['fecha'];?>','producto','tab');
    
</script>