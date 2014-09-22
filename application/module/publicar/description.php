<?php 
/*
 * Used in ajax call
 */
$animal = $_POST['animal'];

$check1 = array('adoptar','encontrado','perdidos');
$check2 = array('cruzar');
$precio = true;
if(in_array($_POST['tab'],$check1)){
    $detalles = array('perro'=>array('edad','tamano'),'gato'=>array('edad'));
    $precio=false;
}elseif(in_array($_POST['tab'],$check2)){
    $detalles = array('perro'=>array('edad','tamano','pedigree'),'gato'=>array('edad','pedigree'));
    $precio=false;
}else{
    $detalles = array('perro'=>array('edad','tamano','pedigree','criadero'),'gato'=>array('edad','pedigree'));
}

//var_dump($_POST);die;
?>
<!--
<form style="min-height:260px;" action="/file-upload" class="dropzone" id="dropzone" enctype="multipart/form-data">
   <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
</form>
-->
<form action="/publicar/addMascota/" id="form_description" method="post" enctype="multipart/form-data">
    <div style="position:relative;padding:40px">
        <input type="hidden" name="animal" value="<?php echo $animal;?>"/>
        <input type="hidden" name="tab" value="<?php echo $_POST['tab'];?>"/>
        <!--
        <div class="publicar_item">
            <div class="publicar_item_header">Fotos</div>
            <div class="publicar_sub_item">
                    <label for="file">Elegir foto(s)</label>
                    <input type="file" name="file[]" multiple="multiple" id="selectFile"><br>
            </div>
        </div>
        -->
        <div class="publicar_item">
            <div class="publicar_item_header"><?php echo $GLOBALS['raza_o_animal'][$animal]; ?></div>
            <div class="publicar_sub_item">
                <select class="animal_detail" name="animal_detail" style="width:200px;">
                    <?php
                        foreach($GLOBALS['raza'][$animal] as $row){
                            echo '<option>'.$row.'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        
        <?php if(strcmp($_POST['tab'],'adoptar')===0){?>
        <div class="publicar_item">
            <div class="publicar_item_header">Refugio</div>
            <div class="publicar_sub_item">
                <select class="" name="refugio" style="width:200px;">
                    <option></option>
                </select>
            </div>
        </div>
        <?php } ?>
        
        <div class="publicar_item item_sexo">
            <div class="publicar_item_header">Sexo</div>
            <div class="publicar_sub_item">
                <input type="radio" name="sexo" value="macho"/> Macho<br/>
                <input type="radio" name="sexo" value="hembra"/> Hembra
            </div>
        </div>
        
        <div class="publicar_item item_edad">
            <div class="publicar_item_header">Edad</div>
            <?php if($detalles[$animal] && in_array('edad', $detalles[$animal])){?>
            <div class="publicar_sub_item">
                <input type="radio" name="edad" value="cachorro"/> Junior <span class="gristxt">(0 a 12 meses)</span><br/>
                <input type="radio" name="edad" value="adulto"/> Adulto <span class="gristxt">(1 a 6 a&ntilde;os)</span><br/>
                <input type="radio" name="edad" value="senior"/> Senior <span class="gristxt">(7 a&ntilde;os en adelante)</span><br/>
            </div>
            <?php }?>
            <div class="publicar_sub_item item_fecha">
                <label>Fecha de nacimiento</label>
                <input name="fecha_datepicker" value="" class="datepicker" type="text"/>
                <input name="fecha" id="fecha" value="" type="hidden"/>
                <span class="input_error"></span>
            </div>
        </div>
        <?php if($detalles[$animal] && in_array('tamano', $detalles[$animal])){?>
        <div class="publicar_item item_tamano">
            <div class="publicar_item_header">Tama&ntilde;o</div>
            <div class="publicar_sub_item">
                <input type="radio" name="tamano" value="peque&ntilde;o"/> Peque&ntilde;o <span class="gristxt">(0 a 14kg)</span><br/>
                <input type="radio" name="tamano" value="mediano"/> Mediano <span class="gristxt">(14 a 40kg)</span><br/>
                <input type="radio" name="tamano" value="grande"/> Grande <span class="gristxt">(40kg en adelante)</span><br/>
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
                                echo '<option value="'.$key.'">'.$key.'</option>';
                                $counter++;
                            }
                        ?>
                    </select><br/>
                </div>
                <div style="height:45px;width:100%">
                    <label>Ciudad/Barrio</label>
                    <select class="ciudad_barrio" name="ciudad_barrio" style="display:none;margin-left:-4px;width:300px;">
                        <option></option>
                    </select><br/>
                </div>
                
            </div>
        </div>
        <?php if($detalles[$animal] && in_array('pedigree', $detalles[$animal])){?>
        <div class="publicar_item item_pedigree">
            <div class="publicar_item_header">Certificado de pedigree</div>
            <div class="publicar_sub_item">
                <input type="radio" name="pedigree" value="si"/> Si<br/>
                <input type="radio" name="pedigree" value="no"/> No<br/>
            </div>
        </div>
        <?php } ?>
        <?php if($detalles[$animal] && in_array('criadero', $detalles[$animal])){?>
        <div class="publicar_item item_criadero">
            <div class="publicar_item_header">El perro pertenece a un criadero</div>
            <div class="publicar_sub_item">
                <input type="radio" name="criadero" value="si"/> Si<br/>
                <input type="radio" name="criadero" value="no"/> No<br/>
            </div>
        </div>
        <?php } ?>
        <div class="publicar_item">
            <div class="publicar_item_header">Describe tu mascota</div>
            <?php if($precio){?>
            <div class="publicar_sub_item">
                <label>Precio</label><input name="precio" type="text"/><br/>
            </div>
            <?php } ?>
            <div class="publicar_sub_item">
                <label>Titulo</label><input name="titulo" type="text"/><span class="input_error"></span>
            </div>
            <div class="publicar_sub_item">
                <div>
                    <label style="margin-bottom:10px;">Descripcion</label><br/>
                    <div style="position:relative;margin-left:-3px;vertical-align: middle;display:inline-block;width:100%;">
                        <textarea id="nicedit_text" style="width:100%;height:250px;"></textarea>
                        <span style="position:absolute;top:0px;right:0px;" class="input_error"></span>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align:center;">
            <button onclick="Publicar.slideRight(this,'-3000');return false;/*Publicar.submit(this);return false;*/">Siguiente</button>
        </div>
    </div>
    <div style="clear:both"></div>
</form>
<script>
    
    
    $('.datepicker').datepicker({ 
        changeYear: true, 
        yearRange: "1990:2014",
        altFormat: "yy-mm-dd",
        altField: "#fecha"
    });
    
    nicEditors.allTextAreas();

    Ready.init();
</script>