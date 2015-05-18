
<?php $publication_hash = substr( md5(rand()), 0, 10);  ?>


<style>
    .publicar_header > ol > li{
        width:33%;
    }
    
</style>
<div class="publicar" style="overflow-x:hidden;overflow-y:hidden">
    <div class="publicar_header">
        <ol>
            <li class="step highlight"><a href="#" onclick="Publicar.slideRight(0,false);">Para que mascota</a></li>
            <li class="publicar_header_arrow">&nbsp;</li>
            <li class="step"><a href="#" onclick="Publicar.slideRight(1,false);return false;">Escribe tu consejo</a></li>
            <li class="publicar_header_arrow">&nbsp;</li>
            <li class="step" style="border-right:0;"><a href="#">Publicar</a></li>
        </ol>
    </div>
    <div  id="publicar_slider" style="position:relative;width:100%;">
        <div class="slides" style="text-align: center;">
            <div  style="position:relative;padding:40px">
                <img onclick="Publicar.sub_tab='perro';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_perro.jpg"/>
                <img onclick="Publicar.sub_tab='gato';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_gato.jpg"/>
                <img onclick="Publicar.sub_tab='ave';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_ave.jpg"/>
                <img onclick="Publicar.sub_tab='reptil';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_reptil.jpg"/><br/>
                <img onclick="Publicar.sub_tab='mamifero';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_pequenosmamiferos.jpg"/>
                <img onclick="Publicar.sub_tab='pez';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_pez.jpg"/>
                <img onclick="Publicar.sub_tab='otro';Publicar.slideRight(1,true);" src="<?php echo MEDIA; ?>mascota_otros.jpg"/>
            </div>
        </div>
        <div class="slides" style="position:absolute;left:1000px;width:100%;">
            <div style="margin:40px 40px 0px 40px;">
                <div class="publicar_item_header">Fotos</div>
                <form action="/publicar/addPhoto/" method="post" class="dropzone" id="fotos" enctype="multipart/form-data">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                    <input type="hidden" name="table" value="consejo"/>
                    <input type="hidden" name="publication_hash" value="<?php echo $publication_hash; ?>"/>
                </form>
                <div style="clear:both"></div>
            </div>
            <form id="form_description" action="/publicar/addConsejo/" method="post" enctype="multipart/form-data">
                <input type="hidden" name="publication_hash" value="<?php echo $publication_hash; ?>"/>
                <div style="position:relative;padding:40px">
                    <div class="publicar_item">
                        <div class="publicar_item_header">Consejo</div>
                        <div class="publicar_sub_item">
                            <label>Titulo</label><input name="titulo" type="text"/><span class="input_error"></span><br/>
                            <div>
                                <label style="margin-bottom:10px;">Escribe tu consejo</label><br/>
                                <div style="position:relative;margin-left:-3px;vertical-align: middle;display:inline-block;width:100%;">
                                    <textarea id="nicedit_text" style="width:100%;height:250px;"></textarea>
                                    <span style="position:absolute;top:0px;right:0px;" class="input_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <button onclick="Publicar.submit(this,'addConsejo');return false;">Publicar</button>
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
    Publicar.group='consejo';
    nicEditors.allTextAreas();
</script>