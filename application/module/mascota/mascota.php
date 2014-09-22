
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo $mascota['titulo'];?>
        </h2>
        <div style="padding-top:20px;">
            <div class="img_box_xl" style="margin-right:20px;">
                <?php 
                    $dir = MEDIA.'upload/'.$mascota['usuario'].'/'.$mascota['id'];
                    $files = scandir($dir, 1);
                ?>
                <img onclick="" alt="<?php echo $mascota['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$files[0]; ?>">
            </div>

            <div style="display:inline-block" class="single_item">
                <!--<div class="fright gristxt">1 voto <span class="excelente">10,00</span></div>-->
                <h2 style="padding-bottom:20px;"><?php echo strtoupper($mascota['tab']);?></h2>
                <h5 >Direcc&iacute;on:</h5>
                <p class="gristxt"><?php echo ucfirst($mascota['ciudad_barrio']);?>, <?php echo ucfirst($mascota['departamento']);?></p><br/>
                <button onclick="Contactar.show(<?php echo $mascota['usuario']; ?>)">Contactar</button>
                <?php if($_SESSION['user']->id==$mascota['usuario']){ ?>
                <form style="margin-top:20px;"method="GET" action="/mascota/editar/<?php echo $mascota['id'];?>">
                    <input type="hidden" value="<?php echo $mascota['tab'];?>" name="tab"/>
                   
                    <input type="submit" value="Editar"/>
                </form>
                <?php } ?>
                <!--
                <div style="position:absolute;right:0px;top:0px;">
                     <form style="display:inline;" method="POST" action="/comprar/delete/">
                        <input type="hidden" name="id" value="<?php echo $mascota['id'];?>"/>
                        <button style="margin-left:10px;">Borrar</button>
                    </form>
                </div>
                -->
            </div>
            <div class="item_datos" style="margin-top:20px;">
                <h4>Datos</h4>
                <?php echo $GLOBALS['raza_o_animal'][$mascota['animal']]; ?>: <?php echo ucfirst($mascota['animal_detail']);?><br/>
                Precio: $<?php echo ucfirst($mascota['precio']);?><br/>
                Tama&ntilde;o: <?php echo ucfirst($mascota['tamano']);?><br/>
                Edad: <?php echo ucfirst($mascota['edad']);?><br/>
                Sexo: <?php echo ucfirst($mascota['sexo']);?><br/>
                Pedigree: <?php echo ucfirst($mascota['pedigree']);?><br/>
                Criadero: <?php echo ucfirst($mascota['criadero']);?><br/>
                <?php 
                if($mascota['horario']){
                    echo 'Horario: '.$mascota['horario'].'';
                }
                if($mascota['link']){
                    echo '<a class="gristxt" title="" href="'.$mascota['link'].'">'.$mascota['link'].'</a>';
                }
                ?>
            </div>
            <div style="margin-top:20px;">
                <h4>Descripci&oacute;n</h4>
                <p class="descripcion"><?php echo $mascota['descripcion'];?></p>
            </div>
        </div>
    </div>
</div>
