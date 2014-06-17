
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <div style="float:left;margin-right:30px;" class="img_box_large">
            <img onclick="" alt="<?php echo $mascota['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$mascota['foto_1']; ?>">
        </div>
        <div class="single_item">
            <!--<div class="fright gristxt">1 voto <span class="excelente">10,00</span></div>-->
            <h3>
                <a class="bigtxt" href="#"><?php echo $mascota['titulo'];?></a>
            </h3>
            <p class="gristxt"><?php echo $GLOBALS['raza_o_animal'][$mascota['animal']]; ?>: <?php echo ucfirst($mascota['animal_detail']);?></p><br/>
            <p class="gristxt">Localizacion: <?php echo ucfirst($mascota['ciudad_barrio']);?>, <?php echo ucfirst($mascota['departamento']);?></p><br/>
            <p class="gristxt">Precio: $<?php echo ucfirst($mascota['precio']);?></p><br/>
            
            <p class="gristxt">Tama&ntilde;o: <?php echo ucfirst($mascota['tamano']);?></p><br/>
            <p class="gristxt">Edad: <?php echo ucfirst($mascota['edad']);?></p><br/>
            <p class="gristxt">Sexo: <?php echo ucfirst($mascota['sexo']);?></p><br/>
            <p class="gristxt">Pedigree: <?php echo ucfirst($mascota['pedigree']);?> - Criadero: <?php echo ucfirst($mascota['criadero']);?></p><br/>
            <?php 
            if($mascota['horario']){
                echo '<p class="gristxt nolink" title="" href="#">Horario: '.$mascota['horario'].'</p>';
            }
            if($mascota['link']){
                echo '<a class="gristxt" title="" href="'.$mascota['link'].'">'.$mascota['link'].'</a>';
            }
            ?>
            <p class="descripcion"><?php echo $mascota['descripcion'];?></p>
            <button onclick="Contactar.show(<?php echo $mascota['usuario']; ?>)" style="float:right">Contactar Due&ntilde;o</button>
            <!--
            <div style="position:absolute;right:0px;top:0px;">
                 <form style="display:inline;" method="POST" action="/comprar/delete/">
                    <input type="hidden" name="id" value="<?php echo $mascota['id'];?>"/>
                    <button style="margin-left:10px;">Borrar</button>
                </form>
            </div>
            -->
        </div>
    </div>
</div>
