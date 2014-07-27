
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <div style="float:left;margin-right:30px;" class="img_box_large">
            <img style="height:100%" alt="<?php echo $anuncio['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$anuncio['foto_1']; ?>">
        </div>
        <div class="single_item">
            <!--<div class="fright gristxt">1 voto <span class="excelente">10,00</span></div>-->
            <h3>
                <a class="bigtxt" href="#"><?php echo $anuncio['titulo'];?></a>
            </h3>
            <p class="gristxt">Localizacion: <?php echo ucfirst($anuncio['ciudad']);?>, <?php echo ucfirst($anuncio['departamento']);?></p>
            
            <?php 
            if($anuncio['horario']){
                echo '<p class="gristxt nolink" title="" href="#">Horario: '.$anuncio['horario'].'</p>';
            }
            if($anuncio['link']){
                echo '<a class="gristxt" title="" href="'.$anuncio['link'].'">'.$anuncio['link'].'</a>';
            }
            ?>
            <p class="descripcion"><?php echo $anuncio['descripcion'];?></p>
            <button onclick="Contactar.show(<?php echo $anuncio['usuario']; ?>)" style="float:right">Contactar</button>
            <!--
            <div style="position:absolute;right:0px;top:0px;">
                 <form style="display:inline;" method="POST" action="/comprar/delete/">
                    <input type="hidden" name="id" value="<?php echo $anuncio['id'];?>"/>
                    <button style="margin-left:10px;">Borrar</button>
                </form>
            </div>
            -->
        </div>
    </div>
</div>
