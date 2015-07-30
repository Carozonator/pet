<?php 
/*
 * Used in ajax call
 */
$animal = $data['animal'];

//$publication_hash = substr( md5(rand()), 0, 10); 

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
                        <form id="fotos_edit" action="/publicar/addPhotoEditar/" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="publication_id" value="<?php echo $id;?>"/>
                            <input type="hidden" name="table" value="consejo"/>
                            <input type="hidden" name="tab" value="<?php echo $_REQUEST['tab'];?>"/>
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
            <form action="/publicar/updateConsejo/" method="post" id="form_description" enctype="multipart/form-data">
                
                    <input type="hidden" id="publication_id" name="publication_id" value="<?php echo $id;?>"/>
                    
                    <div class="publicar_item">
                        <div class="publicar_item_header">Describe tu consejo</div>
                        
                        <div class="publicar_sub_item">
                            <label>Titulo</label><input name="titulo" type="text" value="<?php echo $data['titulo']; ?>"/><span class="input_error"></span>
                        </div>
                        <div class="publicar_sub_item">
                            <div>
                                <label style="margin-bottom:10px;">Consejo</label><br/>
                                <div style="position:relative;margin-left:-3px;vertical-align: middle;display:inline-block;width:100%;">
                                    <textarea id="nicedit_text" style="width:100%;height:250px;"><?php echo htmlEncodeText($data['descripcion']); ?></textarea>
                                    <span style="position:absolute;top:0px;right:0px;" class="input_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <button onclick="Publicar.submit(this,'updateConsejo');return false;">Guardar</button>
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
    
    Ready.initEdit('<?php echo $data['fecha'];?>','mascota','tab');

</script>