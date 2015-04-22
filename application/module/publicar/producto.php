<?php 


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

$publication_hash = substr( md5(rand()), 0, 10);

?>

<div class="publicar" style="overflow-x:hidden;overflow-y:hidden">
    <div class="publicar_header">
        <ol>
            <li class="step highlight"><a href="#" onclick="Publicar.slideRight(0,false);">Elige para que mascota</a></li>
            <li class="publicar_header_arrow">&nbsp;</li>
            <li class="step"><a href="#" onclick="Publicar.slideRight(1,false);">Elige qu&eacute; tipo de producto</a></li>
            <li class="publicar_header_arrow">&nbsp;</li>
            <li class="step"><a href="#" onclick="Publicar.slideRight(2,false);return false;">Describe tu producto</a></li>
            <li class="publicar_header_arrow">&nbsp;</li>
            <li class="step" style="border-right:0;"><a href="#">Publicar</a></li>
        </ol>
    </div>
    <div  id="publicar_slider" style="position:relative;width:100%;">
        <div class="slides" style="text-align: center;">
            <div  style="position:relative;padding:40px">
                <img onclick="Publicar.animal='perro';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_perro.jpg"/>
                <img onclick="Publicar.animal='gato';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_gato.jpg"/>
                <img onclick="Publicar.animal='ave';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_ave.jpg"/>
                <img onclick="Publicar.animal='reptil';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_reptil.jpg"/><br/>
                <img onclick="Publicar.animal='mamifero';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_pequenosmamiferos.jpg"/>
                <img onclick="Publicar.animal='pez';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_pez.jpg"/>
                <img onclick="Publicar.animal='otro';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_otros.jpg"/>
            </div>
        </div>
        <div class="slides" style="position:absolute;left:1000px;width:100%;">
                    <div style="margin:20px;text-align:center">
                        <?php
                        
                        foreach($images as $key => $row){
                            
                            foreach($row as $k=>$r){
                                $src = MEDIA.'tienda/'.$key.'/'.$r;
                                if(substr($r,0,1)!='.'){
                                    echo '<img onclick="Publicar.tab=\''.array_shift(explode('.', $r)).'\';Publicar.slideRight(2,true);" style="display:none" class="'.$key.' tienda" src="'.$src.'"/>';
                                }
                            }
                        }
                        
                        ?>
                    </div>
        </div>
        <div class="slides" style="position:absolute;left:2000px;width:100%;">
            
            
            <div style="margin:40px 40px 0px 40px;">
                <div class="publicar_item_header">Fotos</div>
                <form action="/publicar/addPhoto/" method="post" class="dropzone" id="fotos" enctype="multipart/form-data">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                    <input type="hidden" name="table" value="producto"/>
                    <input type="hidden" name="publication_hash" value="<?php echo $publication_hash; ?>"/>
                </form>
                <div style="clear:both"></div>
            </div>
            
            <div class="datos_obligatorios">* Todos los datos obligatorios</div>
            
            <form id="form_description" action="/publicar/addProducto/" method="post" enctype="multipart/form-data">
                <input type="hidden" name="publication_hash" value="<?php echo $publication_hash; ?>"/>
                <div style="position:relative;padding:40px">
                    
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
                   
                    <div class="publicar_item">
                        <div class="publicar_item_header">Descripcion</div>
                        <div class="publicar_sub_item">
                            <label>Precio</label>
                            <select class="moneda" name="moneda" style="width:70px;margin-left:-5px;margin-top:-5px;">
                                <option value="uy">$</option>
                                <option value="us">US$</option>
                            </select>
                            <input style="margin-left:5px;width:222px;" name="precio" type="text"/><br/>
                        </div>
                        <div class="publicar_sub_item">
                            <label>Titulo</label><input name="titulo" maxlength="30" placeholder="(30 car&aacute;cteres maximo)" type="text"/><span class="input_error"></span>
                        </div>
                        <div class="publicar_sub_item">
                            <div>
                                <label style="margin-bottom:10px;">Describe tu producto</label><br/>
                                <div style="position:relative;margin-left:-3px;vertical-align: middle;display:inline-block;width:100%;">
                                    <textarea id="nicedit_text" style="width:100%;height:250px;"></textarea>
                                    <span style="position:absolute;top:0px;right:0px;" class="input_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <button onclick="Publicar.submit(this,'addProducto');return false;">Publicar</button>
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
    
    Publicar.group = 'producto';
    nicEditors.allTextAreas();
    /*
    $(document).ready(function(){
        $("select.raza").select2({
            placeholder: "Eligue Raza",
            allowClear: false
        });
        $(document).ready(function(){
        nicEditors.allTextAreas();
        
        $("select.departamento").select2({
            placeholder: "Eligue Departamento",
            allowClear: false,
            
        });
        
        
        
        $("select.ciudad").select2({
            placeholder: "Eligue Ciudad",
            allowClear: false,
            enable:false,
            readonly:true
        });
        
        
        
        $("select.departamento").select2().on('change', function(e){
            var type;
            if(e.val=='Montevideo'){
                $('.barrio').show();
                $('.ciudad').hide();
                type='barrio';
            }else{
                $('.barrio').hide();
                $('.ciudad').show();
                type='ciudad';
            }
            $('select.'+type).html('');
            var data = Publicar.departamento[e.val]
            for(var i in data){
                    $('.'+type).append('<option value="' + data[i]+ '">'+data[i]+'</option>');
            }
        });
        
        
        $("select.barrio").select2({
            placeholder: "Eligue Barrio",
            allowClear: false
        });
        
    });
    })
    */
</script>

