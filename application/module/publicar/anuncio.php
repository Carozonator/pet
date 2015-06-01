
<?php $publication_hash = substr( md5(rand()), 0, 10);  ?>


<style>
    .publicar_header > ol > li{
        width:33%;
    }
    
</style>
<div class="publicar" style="overflow-x:hidden;overflow-y:hidden">
    <div class="publicar_header">
        <ol>
            <li class="step highlight"><a href="#" onclick="Publicar.slideRight(0,false);">Elige qu&eacute; publicar</a></li>
            <li class="publicar_header_arrow">&nbsp;</li>
            <li class="step"><a href="#" onclick="Publicar.slideRight(1,false);return false;">Describe tu servicio</a></li>
            <li class="publicar_header_arrow">&nbsp;</li>
            <li class="step" style="border-right:0;"><a href="#">Publicar</a></li>
        </ol>
    </div>
    <div  id="publicar_slider" style="position:relative;width:100%;">
        <div class="slides" style="text-align: center;">
            <div  style="position:relative;padding:40px">
                <img onclick="Publicar.type='veterinaria';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>anuncios/veterinaria.jpg"/>
                <img onclick="Publicar.type='paseador';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>anuncios/paseador.jpg"/>
                <img onclick="Publicar.type='adiestrador';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>anuncios/adiestrador.jpg"/>
                <img onclick="Publicar.type='pensionado';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>anuncios/pensionado.jpg"/><br/>
                <img onclick="Publicar.type='peluqueria';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>anuncios/peluqueria.jpg"/>
                <img onclick="Publicar.type='servicio_medico';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>anuncios/servicios_medicos_adicionales.jpg"/>
                <img onclick="Publicar.type='otros';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>anuncios/otros.jpg"/>
                
                <?php if($_SESSION['user']->id==7 || $_SESSION['user']->id==1){?>
                    <img onclick="Publicar.type='evento';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>anuncios/evento.png"/>
                <?php } ?>
            </div>
        </div>
        <div class="slides" style="position:absolute;left:1000px;width:100%;">
            <div style="margin:40px 40px 0px 40px;">
                <div class="publicar_item_header">Fotos</div>
                <form action="/publicar/addPhoto/" method="post" class="dropzone" id="fotos" enctype="multipart/form-data">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                    <input type="hidden" name="table" value="anuncio"/>
                    <input type="hidden" name="publication_hash" value="<?php echo $publication_hash; ?>"/>
                </form>
                <div style="clear:both"></div>
            </div>
            <div class="datos_obligatorios">* Campos obligatorios</div>
            <form id="form_description" action="/publicar/addAnuncio/" method="post" enctype="multipart/form-data">
                <input type="hidden" name="publication_hash" value="<?php echo $publication_hash; ?>"/>
                <div style="position:relative;padding:40px">
                    <!--
                    <div class="publicar_item">
                        <div class="publicar_item_header">Ingresa un video</div>
                        <div class="publicar_sub_item">
                            <label>Link de youtube </label><input name="link" type="text"/><br/>
                        </div>
                    </div>
                    -->
                    
                    <div class="publicar_item">
                        
                        <div class="publicar_item_header">Ubicacion y contacto *</div>
                        <div class="publicar_sub_item item_fecha">
                            <label>Fecha</label>
                            <input name="fecha_datepicker" value="" class="datepicker" type="text"/>
                            <input name="fecha" id="fecha" value="" type="hidden"/>
                            <span class="input_error"></span>
                        </div>
                        <div class="publicar_sub_item">
                            <!--
                            <div style="display:none;height:45px;width:100%" class="emergencia">
                                <label>Telefono de Emergencia </label><input name="telefono" type="text"/>
                            </div>
                            -->
                            
                                <label class="horario">Horario </label><input name="horario" type="text"/>
                        </div>
                        <div class="publicar_sub_item">
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
                        <div class="publicar_sub_item">
                            <label>Ciudad/Barrio</label>
                            <select class="ciudad_barrio" name="ciudad_barrio" style="display:none;margin-left:-4px;width:300px;">
                                <option></option>
                            </select><br/>
                        </div>
                        <div class="publicar_sub_item">
                            <label>Direcci&oacute;n </label><input name="direccion" type="text"/>
                        </div>
                    </div>

                    <div class="publicar_item">
                        <div class="publicar_item_header">Describe tu servicio *</div>
                        <div class="publicar_sub_item">
                            <label>Titulo *</label>
                            <input name="titulo" maxlength="40" placeholder="(40 car&aacute;cteres maximo)" type="text"/><span class="input_error"></span>
                        </div>
                        <div class="publicar_sub_item">
                            <label style="margin-bottom:10px;">Describe tu servicio</label><br/>
                            <div style="position:relative;margin-left:-3px;vertical-align: middle;display:inline-block;width:100%;">
                                <textarea id="nicedit_text" style="width:100%;height:250px;"></textarea>
                                <span style="position:absolute;top:0px;right:0px;" class="input_error"></span>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <button onclick="Publicar.submit(this,'addAnuncio');return false;">Publicar</button>
                    </div>
                    <div class="publication_error">
                        * Falta completar campos obligatorios
                    </div>
                </div>
                <div style="clear:both"></div>
            </form>
        </div>
        <div class="slides" style="position:absolute;left:2000px;width:100%;">
            <div style="padding:40px"class="img150">
                <div style="float:left;margin-right:10px;" class="thumb">
                    <a title="Vet- Lesant | Veterinarios en Distrito Federal" href="#"><img alt="Vet- Lesant | Veterinarios en Distrito Federal" src="http://www.mundoanimalia.com/images/veterinario/b3/79/fb/5d8dc5dbd84f605017f1c835da6031d7/thumbm_foto_vetlesant_3880.jpg"></a>
                </div>
                <div class="overflow mbottom">
                </div>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
</div>
<div style="clear:both"></div>
<script>
    Publicar.group='anuncio';
    
</script>