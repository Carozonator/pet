<?php 
/*
 * Used in ajax call
 */
$animal = $_POST['animal'];

$publication_hash = substr( md5(rand()), 0, 10); 

$check1 = array('adoptar','encontrado','perdido');
$check2 = array('cruzar');
$precio = true;
if(in_array($_POST['tab'],$check1)){
    $detalles = array('perro'=>array('edad','tamano'),'gato'=>array('edad'));
    $precio=false;
}elseif(in_array($_POST['tab'],$check2)){
    $detalles = array('perro'=>array('edad','tamano','pedigree'),'gato'=>array('edad','pedigree'));
    $precio=false;
}else{
    $detalles = array('perro'=>array('edad','tamano','pedigree','criadero'),'gato'=>array('edad','pedigree','criadero'));
}

//fechas
switch($_POST['tab']){
    case 'encontrado':
        $fecha_text = 'Se encontró el día...';
        break;
    case 'perdido':
        $fecha_text = 'Se perdio el día...';
        break;
    default:
        $fecha_text = 'Fecha de nacimiento';
}


?>
<!--
<form style="min-height:260px;" action="/file-upload" class="dropzone" id="dropzone" enctype="multipart/form-data">
   <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
</form>
-->
<div style="margin:40px 40px 0px 40px;">
    <div class="publicar_item_header">Fotos
    &nbsp;<span class="gristxt" style="font-size:13px;font-weight:normal;">(Presionar dentro del rectángulo para agregar imágenes)</span>
    </div>
    <form action="/publicar/addPhoto/" method="post" class="dropzone" id="fotos" enctype="multipart/form-data">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
        <input type="hidden" name="table" value="mascota"/>
        <input type="hidden" name="publication_hash" value="<?php echo $publication_hash; ?>" id="publication_id"/>
    </form>
    <div style="clear:both"></div>
</div>

<div class="datos_obligatorios">
    * Campos obligatorios
</div>

<form action="/publicar/addMascota/" id="form_description" method="post" enctype="multipart/form-data">
    <div style="position:relative;padding:40px">
        <input type="hidden" name="animal" value="<?php echo $animal;?>"/>
        <input type="hidden" name="tab" value="<?php echo $_POST['tab'];?>"/>
        <input type="hidden" name="publication_hash" value="<?php echo $publication_hash; ?>" id="publication_id"/>
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
            <div class="publicar_item_header"><?php echo $GLOBALS['raza_o_animal'][$animal]; ?> * </div>
            <div class="publicar_sub_item">
                <select class="animal_detail" name="animal_detail" style="width:200px;">
                    <?php
                        foreach($GLOBALS['raza'][$animal] as $row){
                            echo '<option>'.$row.'</option>';
                        }
                    ?>
                </select>
                <?php if(strcmp($GLOBALS['raza_o_animal'][$animal],'Raza')===0){ ?>
                &nbsp;&nbsp;<span class="gristxt" style="font-size:13px;font-weight:normal;">(seleccionar "Cruza", en caso de no ser de ninguna raza en particular)</span>
                <?php } ?>
            </div>
        </div>
        
        <?php if(strcmp($_POST['tab'],'adoptar')===0){?>
        <div class="publicar_item">
            <div class="publicar_item_header">Refugio</div>
            <div class="publicar_sub_item">
                <select class="refugio" name="refugio" style="width:200px;">
                    <?php foreach($GLOBALS['refugio'] as $ref){ 
                        echo '<option>'.$ref.'</option>';
                    } ?>
                </select>
            </div>
        </div>
        <?php } ?>
        
        <div class="publicar_item item_sexo">
            <div class="publicar_item_header">Sexo *</div>
            <div class="publicar_sub_item">
                <input type="radio" name="sexo" value="macho"/> Macho<br/>
                <input type="radio" name="sexo" value="hembra"/> Hembra<br/>
                <input type="radio" name="sexo" value="camada"/> Camada
            </div>
        </div>
        
        <div class="publicar_item item_edad">
            <div class="publicar_item_header">Edad *</div>
            <?php if($detalles[$animal] && in_array('edad', $detalles[$animal])){?>
            <div class="publicar_sub_item">
                <input type="radio" name="edad" value="junior"/> Junior <span class="gristxt">(0 a 12 meses)</span><br/>
                <input type="radio" name="edad" value="adulto"/> Adulto <span class="gristxt">(1 a 6 a&ntilde;os)</span><br/>
                <input type="radio" name="edad" value="senior"/> Senior <span class="gristxt">(7 a&ntilde;os en adelante)</span><br/>
            </div>
            <?php }?>
            <div class="publicar_sub_item item_fecha">
                <label><?php echo $fecha_text; ?></label>
                <input name="fecha_datepicker" value="" class="datepicker" type="text"/>
                <input name="fecha" id="fecha" value="" type="hidden"/>
                <span class="input_error"></span>
            </div>
        </div>
        <?php if($detalles[$animal] && in_array('tamano', $detalles[$animal])){?>
        <div class="publicar_item item_tamano">
            <div class="publicar_item_header">Tama&ntilde;o *</div>
            <div class="publicar_sub_item">
                <input type="radio" name="tamano" value="peque&ntilde;o"/> Peque&ntilde;o <span class="gristxt">(0 a 14kg)</span><br/>
                <input type="radio" name="tamano" value="mediano"/> Mediano <span class="gristxt">(14 a 40kg)</span><br/>
                <input type="radio" name="tamano" value="grande"/> Grande <span class="gristxt">(40kg en adelante)</span><br/>
            </div>
        </div>
        <?php } ?>
        <div class="publicar_item">
            <div class="publicar_item_header">Ubicaci&oacute;n y Contacto *</div>
            <div class="publicar_sub_item">
                <div style="height:45px;width:100%">
                    <label>Departamento *</label>
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
            </div>
            <div class="publicar_sub_item">
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
            <div class="publicar_item_header">&iquest;Pertenece a un criadero?</div>
            <div class="publicar_sub_item">
                <input type="radio" name="criadero" value="si"/> Si<br/>
                <input type="radio" name="criadero" value="no"/> No<br/>
            </div>
        </div>
        <?php } ?>
        <div class="publicar_item">
            <div class="publicar_item_header">Describe tu mascota *</div>
            <?php if($precio){?>
            <div class="publicar_sub_item">
                <label>Precio *</label>
                <select class="moneda" name="moneda" style="width:70px;margin-left:-5px;margin-top:-5px;">
                    <option value="uy">$</option>
                    <option value="us">US$</option>
                </select>
                <input style="margin-left:5px;width:222px;" name="precio" type="text"/><br/>
            </div>
            <?php } ?>
            <div class="publicar_sub_item">
                <label>Titulo *</label><input name="titulo" maxlength="40" placeholder="(40 car&aacute;cteres maximo)" type="text"/><span class="input_error"></span>
            </div>
            <div class="publicar_sub_item" style="margin-top:10px;">
                <div>
                    <label style="margin-bottom:10px;">Descripci&oacute;n</label><br/>
                    <div style="position:relative;margin-left:-3px;vertical-align: middle;display:inline-block;width:100%;">
                        <textarea id="nicedit_text" style="width:100%;height:250px;"></textarea>
                        <span style="position:absolute;top:0px;right:0px;" class="input_error"></span>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align:center;">
            <button onclick="Publicar.submit(this,'addMascota');return false;/*Publicar.submit(this);return false;*/">Publicar</button>
        </div>
        <div class="publication_error">
            * Falta completar campos obligatorios
        </div>
    </div>
    <div style="clear:both"></div>
</form>
<script>
    
    
    
    
    //nicEditors.allTextAreas();

    Ready.init();
</script>