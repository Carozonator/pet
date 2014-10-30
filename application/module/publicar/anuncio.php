
<?php $publication_hash = substr( md5(rand()), 0, 10);  ?>

<div class="publicar" style="overflow-x:hidden;overflow-y:hidden">
    <div class="publicar_header">
        <ol>
            <li><a href="">Elige qu&eacute; publicar</a></li><li class="publicar_header_arrow">&#10095;</li>
            <li class="ch-wizard-current">Describe tu servicio</li><li class="publicar_header_arrow">&#10095;</li>
            <li class="ch-wizard-step" style="border-right:0;">Publicar</li>
        </ol>
    </div>
    <div  id="publicar_slider" style="position:relative;width:100%;">
        <div class="slides" style="text-align: center;">
            <div  style="position:relative;padding:40px">
                <img onclick="Publicar.type='veterinaria';Publicar.slideRight(this,'-1000');" src="<?php echo MEDIA; ?>anuncio_veterinaria.jpg"/>
                <img onclick="Publicar.type='paseador';Publicar.slideRight(this,'-1000');" src="<?php echo MEDIA; ?>anuncio_paseador.jpg"/>
                <img onclick="Publicar.type='adiestrador';Publicar.slideRight(this,'-1000');" src="<?php echo MEDIA; ?>anuncio_adiestrador.jpg"/>
                <img onclick="Publicar.type='pensionado';Publicar.slideRight(this,'-1000');" src="<?php echo MEDIA; ?>anuncio_pensionado.jpg"/><br/>
                <img onclick="Publicar.type='peluqueria';Publicar.slideRight(this,'-1000');" src="<?php echo MEDIA; ?>anuncio_peluqueria.jpg"/>
                <img onclick="Publicar.type='servicio_medico';Publicar.slideRight(this,'-1000');" src="<?php echo MEDIA; ?>anuncio_serv_medico.jpg"/>
                <img onclick="Publicar.type='otros';Publicar.slideRight(this,'-1000');" src="<?php echo MEDIA; ?>anuncio_otros.jpg"/>
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
            <form id="form_description" action="/publicar/addAnuncio/" method="post" enctype="multipart/form-data">
                <input type="hidden" value="publish" name="action"/>
                <input type="hidden" name="publication_hash" value="<?php echo $publication_hash; ?>"/>
                <div style="position:relative;padding:40px">
                    
                    <div class="publicar_item">
                        <div class="publicar_item_header">Ingresa un video</div>
                        <div class="publicar_sub_item">
                            <label>Link de youtube </label><input name="link" type="text"/><br/>
                        </div>
                    </div>
                    <div class="publicar_item">
                        <div class="publicar_item_header">Ubicacion y contacto</div>
                        <div class="publicar_sub_item">
                            <div style="display:none;height:45px;width:100%" class="emergencia">
                                <label>Telefono de Emergencia </label><input name="telefono" type="text"/>
                            </div>
                            <div style="height:45px;width:100%">
                                <label class="horario">Horario </label><input name="horario" type="text"/>
                            </div>
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
                            <div style="height:45px;width:100%">
                                <label>Direccion </label><input name="direccion" type="text"/>
                            </div>
                        </div>
                    </div>

                    <div class="publicar_item">
                        <div class="publicar_item_header">Describe tu servicio</div>
                        <div class="publicar_sub_item">
                            <label>Titulo</label><input name="titulo" type="text"/><span class="input_error"></span><br/>
                            <div>
                                <label style="margin-bottom:10px;">Describe tu servicio</label><br/>
                                <div style="position:relative;margin-left:-3px;vertical-align: middle;display:inline-block;width:100%;">
                                    <textarea id="nicedit_text" style="width:100%;height:250px;"></textarea>
                                    <span style="position:absolute;top:0px;right:0px;" class="input_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <button onclick="Publicar.submit(this);return false;">Publicar</button>
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
                    <!--<div class="fright gristxt">1 voto <span class="excelente">10,00</span></div>-->
                    <h3><a class="bigtxt" title="Vet- Lesant | Veterinarios en Distrito Federal" href="http://www.mundoanimalia.com/veterinario/vet__lesant/25294">Vet- Lesant</a></h3>
                    <p class="gristxt"> Goya 20 Local A Col Insurgentes Mixcoac entre patriotismo y Eje 7</p>
                    <a class="gristxt nolink" title="Veterinarios en Benito Juarez" href="http://www.mundoanimalia.com/veterinarios/Mexico/Distrito_Federal/Benito_Juarez/475568">Veterinarios en Benito Juarez</a> (Distrito Federal)
                    <p class="descripcion">Somos una clinica de prevencion y diagnostico de enfermedades, por medio de la aplicacion de la medicina preventiva ayudamos a las mascotas y sus propietarios a tener una convivencia sana y feliz,...</p>
                    <!--
                    <ul class="calidad_servicio">
                        <li>
                            <div class="q_calidad">Trato con mi mascota:</div>
                            <div class="overflow">
                                <span class="bar-excelente left">Trato con mi mascota:</span><p class="q_legend">Muy bueno</p>
                            </div>
                        </li>
                    </ul>
                    -->
                </div>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
</div>
<div style="clear:both"></div>
<script>
    nicEditors.allTextAreas();
</script>