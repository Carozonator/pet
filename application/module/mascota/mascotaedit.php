<?php 
/*
 * Used in ajax call
 */
$animal = $mascota['animal'];

//$publication_hash = substr( md5(rand()), 0, 10); 

$check1 = array('adoptar','encontrado','perdido');
$check2 = array('cruzar');
$precio = true;
if(in_array($_REQUEST['tab'],$check1)){
    $detalles = array('perro'=>array('edad','tamano'),'gato'=>array('edad'));
    $precio=false;
}elseif(in_array($_REQUEST['tab'],$check2)){
    $detalles = array('perro'=>array('edad','tamano','pedigree'),'gato'=>array('edad','pedigree'));
    $precio=false;
}else{
    $detalles = array('perro'=>array('edad','tamano','pedigree','criadero'),'gato'=>array('edad','pedigree','criadero'));
}

//var_dump($_REQUEST);die;
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
                        <img style="cursor:move;" alt="<?php echo $mascota['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$f['usuario'].'/thumb_'.$f['name']; ?>">
                    </li>
                <?php } ?>
                    <li class="unsortable">
                        <form id="fotos" action="/publicar/addPhotoEditar/" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="publication_id" value="<?php echo $id;?>"/>
                            <input type="hidden" name="table" value="mascota"/>
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
                </ul>
            </div>
            <div style="clear:both"></div>
            <form action="/publicar/updateMascota/" method="post" id="form_description" enctype="multipart/form-data">
                
                    <input type="hidden" id="publication_id" name="publication_id" value="<?php echo $id;?>"/>
                    <input type="hidden" name="animal" value="<?php echo $animal;?>"/>
                    <div class="publicar_item">
                        <div class="publicar_item_header">Donde Publicar</div>
                        <div class="publicar_sub_item">
                            <select class="tab_select" name="tab_select" style="width:200px;">
                                <?php foreach($GLOBALS['tab'] as $key=>$row){ 
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
                        <div class="publicar_item_header"><?php echo $GLOBALS['raza_o_animal'][$animal]; ?></div>
                        <div class="publicar_sub_item">
                            <select class="animal_detail" name="animal_detail" style="width:200px;">
                                <?php
                                    foreach($GLOBALS['raza'][$animal] as $row){
                                        $selected='';
                                        if($row==$mascota['animal_detail']){
                                            $selected = 'selected';
                                        }
                                        echo '<option '.$selected.'>'.$row.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <?php if(strcmp($_REQUEST['tab'],'adoptar')===0){?>
                    <div class="publicar_item">
                        <div class="publicar_item_header">Refugio</div>
                        <div class="publicar_sub_item">
                            <select class="refugio" name="refugio" style="width:200px;">
                                <?php foreach($GLOBALS['refugio'] as $ref){ 
                                    if(strcmp($ref,$mascota['refugio'])===0){
                                        echo '<option selected>'.$ref.'</option>';
                                    }else{
                                        echo '<option>'.$ref.'</option>';
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="publicar_item item_sexo">
                        <div class="publicar_item_header">Sexo</div>
                        <div class="publicar_sub_item">
                            <input type="radio" name="sexo" value="macho" <?php if($mascota['sexo']=='macho'){echo 'checked';}?>/> Macho<br/>
                            <input type="radio" name="sexo" value="hembra" <?php if($mascota['sexo']=='hembra'){echo 'checked';}?>/> Hembra<br/>
                            <input type="radio" name="sexo" value="camada"/> Camada
                        </div>
                    </div>

                    <div class="publicar_item item_edad">
                        <div class="publicar_item_header">Edad</div>
                        <?php if($detalles[$animal] && in_array('edad', $detalles[$animal])){?>
                        <div class="publicar_sub_item">
                            <input type="radio" name="edad" value="junior" <?php if($mascota['edad']=='junior'){echo 'checked';}?>/> Junior <span class="gristxt">(0 a 12 meses)</span><br/>
                            <input type="radio" name="edad" value="adulto" <?php if($mascota['edad']=='adulto'){echo 'checked';}?>/> Adulto <span class="gristxt">(1 a 6 a&ntilde;os)</span><br/>
                            <input type="radio" name="edad" value="senior" <?php if($mascota['edad']=='senior'){echo 'checked';}?>/> Senior <span class="gristxt">(7 a&ntilde;os en adelante)</span><br/>
                        </div>
                        <?php }?>
                        <div class="publicar_sub_item item_fecha">
                            <label>Fecha de nacimiento</label>
                            <input name="fecha_datepicker" value="<?php $mascota['fecha'];?>" class="datepicker" type="text"/>
                            <input name="fecha" id="fecha" value="<?php $mascota['fecha'];?>" type="hidden"/>
                            <span class="input_error"></span>
                        </div>
                    </div>
                    <?php if($detalles[$animal] && in_array('tamano', $detalles[$animal])){?>
                    <div class="publicar_item item_tamano">
                        <div class="publicar_item_header">Tama&ntilde;o</div>
                        <div class="publicar_sub_item">
                            <input type="radio" name="tamano" value="peque&ntilde;o" <?php if(substr($mascota['tamano'],0,3)=='peq'){echo 'checked';}?>/> Peque&ntilde;o <span class="gristxt">(0 a 14kg)</span><br/>
                            <input type="radio" name="tamano" value="mediano" <?php if($mascota['tamano']=='mediano'){echo 'checked';}?>/> Mediano <span class="gristxt">(14 a 40kg)</span><br/>
                            <input type="radio" name="tamano" value="grande" <?php if($mascota['tamano']=='grande'){echo 'checked';}?>/> Grande <span class="gristxt">(40kg en adelante)</span><br/>
                        </div>
                    </div>
                    <?php } ?>
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
                                            if($key==$mascota['departamento']){
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
                                <select class="ciudad_barrio" name="ciudad_barrio" style="display:none;margin-left:-4px;width:300px;">
                                    <?php 
                                    if($mascota['ciudad_barrio']!=''){
                                        echo '<option value="'.$mascota['ciudad_barrio'].'">'.$mascota['ciudad_barrio'].'<option>';
                                    }else{
                                        echo '<option></option>';
                                    }
                                    ?>
                                    
                                </select><br/>
                            </div>

                        </div>
                    </div>
                    <?php if($detalles[$animal] && in_array('pedigree', $detalles[$animal])){?>
                    <div class="publicar_item item_pedigree">
                        <div class="publicar_item_header">Certificado de pedigree</div>
                        <div class="publicar_sub_item">
                            <input type="radio" name="pedigree" value="si" <?php if($mascota['pedigree']=='si'){echo 'checked';}?>/> Si<br/>
                            <input type="radio" name="pedigree" value="no" <?php if($mascota['pedigree']=='no'){echo 'checked';}?>/> No<br/>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($detalles[$animal] && in_array('criadero', $detalles[$animal])){?>
                    <div class="publicar_item item_criadero">
                        <div class="publicar_item_header">El perro pertenece a un criadero</div>
                        <div class="publicar_sub_item">
                            <input type="radio" name="criadero" value="si" <?php if($mascota['criadero']=='si'){echo 'checked';}?>/> Si<br/>
                            <input type="radio" name="criadero" value="no"  <?php if($mascota['criadero']=='no'){echo 'checked';}?>/> No<br/>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="publicar_item">
                        <div class="publicar_item_header">Describe tu mascota</div>
                        <?php if($precio){?>
                        <div class="publicar_sub_item">
                            <label>Precio</label><input name="precio" type="text" value="<?php echo $mascota['precio']; ?>"/><br/>
                        </div>
                        <?php } ?>
                        <div class="publicar_sub_item">
                            <label>Titulo</label><input name="titulo" type="text" value="<?php echo $mascota['titulo']; ?>"/><span class="input_error"></span>
                        </div>
                        <div class="publicar_sub_item">
                            <div>
                                <label style="margin-bottom:10px;">Descripcion</label><br/>
                                <div style="position:relative;margin-left:-3px;vertical-align: middle;display:inline-block;width:100%;">
                                    <textarea id="nicedit_text" style="width:100%;height:250px;"><?php echo $mascota['descripcion']; ?></textarea>
                                    <span style="position:absolute;top:0px;right:0px;" class="input_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <button onclick="Publicar.submit(this,'updateMascota');return false;">Guardar</button>
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
    
    
    $('input[type=file]').change(function() {
        $('#submit_photo').trigger("click");
    });
    
    $('#fotos').on("click",function(){
        document.getElementById('selectedFile').click();
    });
    
    $('.datepicker').datepicker({ 
        changeYear: true, 
        gotoCurrent:true,
        yearRange: "1990:2015",
        altFormat: "yy-mm-dd",
        altField: "#fecha"
    });
    
    $(".datepicker").datepicker("setDate", today());
    
    $(".sortable_photo").sortable({
        items: "li:not(.unsortable)",
        update: function( event, ui ) {
            var order = {};
            $('#photo_order li').each(function(index,elem){
                order[$(elem).attr('id')] = index;
            });
            
            var data = {order:order,publication_id:$('#publication_id').val()};
            
            $.ajax({
                url:'/publicar/updatePhoto/',
                data:data,
                type:'post',
                success:function(response){
                    console.log(response);
                }
            });
        }
    });
    
    nicEditors.allTextAreas();

    Ready.init();
</script>