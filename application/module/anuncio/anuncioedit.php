<?php 
/*
 * Used in ajax call
 */



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
                
                    <li class="unsortable" style="<?php if(count($foto)>=6){echo 'display:none';}?>">
                        <form id="fotos_edit" action="/publicar/addPhotoEditar/" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="publication_id" value="<?php echo $id;?>"/>
                            <input type="hidden" name="table" value="anuncio"/>
                            <!--<input type="hidden" name="tab" value="<?php echo $_REQUEST['tab'];?>"/>-->
                            <input type="file" id="selectedFile" name="file" style="display: none;" />
                            <input id="submit_photo" type="submit" value="" onclick="" />
                        </form>
                    </li>
                </ul>
            </div>
            <div style="clear:both"></div>
            <form action="/publicar/updateAnuncio/" method="post" id="form_description" enctype="multipart/form-data">
                
                    <input type="hidden" id="publication_id" name="publication_id" value="<?php echo $id;?>"/>
                    <div class="publicar_item">
                        <div class="publicar_item_header">Tipo</div>
                        <div class="publicar_sub_item">
                            <select class="tab_select" name="tab_select" style="width:200px;">
                                <?php foreach($GLOBALS['anuncio'] as $key=>$row){ 
                                    
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
                        <div class="publicar_item_header">Ubicacion y Contacto</div>
                        <!--
                        <div class="publicar_sub_item item_fecha">
                            <label>Fecha</label><input name="fecha_datepicker" value="<?php echo $data['fecha'];?>" class="datepicker" type="text"/>
                            <input name="fecha" id="fecha" value="<?php echo $data['fecha'];?>" type="hidden"/>
                            <span class="input_error"></span>
                        </div>
                        -->
                        <div class="publicar_sub_item">
                            <label class="horario">Horario </label><input name="horario" value="<?php echo $data['horario'];?>" type="text"/>
                        </div>
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
                        <div class="publicar_item_header">Describe tu anuncio</div>
                        <div class="publicar_sub_item">
                            <label>Titulo</label><input name="titulo" type="text" value="<?php echo $data['titulo']; ?>"/><span class="input_error"></span>
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
                        <button onclick="Publicar.submit(this,'updateAnuncio');return false;">Guardar</button>
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
    
    Ready.initEdit('<?php echo $data['fecha'];?>','anuncio','tab');
    
</script>