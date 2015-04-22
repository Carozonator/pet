
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;color:#9C2490">
            <?php echo $mascota['titulo'];?>
        </h2>
        <div style="float:right;max-height:400px;width:<?php echo (count($foto)>=4?'300':'150'); ?>px;overflow:auto;">
        <?php foreach($foto as $f){ ?>
            <div class="img_box_small">
                <a href="<?php echo MEDIA.'upload/'.$f['usuario'].'/'.$f['name']; ?>" data-lightbox="roadtrip" >
                    <img alt="<?php echo $mascota['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$f['usuario'].'/thumb_'.$f['name']; ?>">
                </a>
            </div>
        <?php } ?>
        </div>
        <div style="padding-top:20px;">
            <div class="img_box_xl" style="margin-right:20px;">
                <img alt="<?php echo $mascota['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name']; ?>">
            </div>
            <div style="display:inline-block">
                <h2 style="padding-bottom:20px;">
                    <!--<?php echo strtoupper($mascota['tab']);?>-->
                </h2>
                <h5>Direcc&iacute;on:</h5>
                
                <p class="gristxt"><?php echo (!empty($mascota['ciudad_barrio'])?htmlEncodeText(ucfirst($mascota['ciudad_barrio'])).", ":"");?><?php echo htmlEncodeText(ucfirst($mascota['departamento']));?></p>
                <div class="precio" style="font-size:20px;">
                    <?php 
                    if($mascota['moneda']=='uy'){
                        $moneda = '$';
                    }elseif($mascota['moneda']=='us'){
                        $moneda = 'U$S';
                    }
                    echo moneda($mascota['moneda']).precio($mascota['precio']);?>
                </div>
                <br/>
                <button onclick="Contactar.show(<?php echo $mascota['usuario']; ?>)">Contactar</button>
                <?php if($_SESSION['user']->id==$mascota['usuario']){ ?>
                    <form style="margin-top:20px;"method="GET" action="/mascota/editar/<?php echo $mascota['id'];?>/">
                        <input type="hidden" value="<?php echo $mascota['tab'];?>" name="tab"/>
                        <input type="submit" value="Editar"/>
                    </form>
                <?php } ?>
            </div>
        </div>
            
            
        

        <div class="item_datos" style="margin-top:20px;">
            <h4 style="color:#9C2490">Datos</h4>
            <span class="gristxt_1"><?php echo $GLOBALS['raza_o_animal'][$mascota['animal']]; ?>:</span> <?php echo ucfirst($mascota['animal_detail']);?><br/>
            
            <span class="gristxt_1">Tama&ntilde;o:</span>  <?php echo ucfirst($mascota['tamano']);?><br/>
            <span class="gristxt_1">Edad:</span> <?php echo ucfirst($mascota['edad']);?><br/>
            <span class="gristxt_1">Sexo:</span> <?php echo ucfirst($mascota['sexo']);?><br/>
            <span class="gristxt_1">Pedigree:</span> <?php echo ucfirst($mascota['pedigree']);?><br/>
            <span class="gristxt_1">Criadero:</span> <?php echo ucfirst($mascota['criadero']);?><br/>
            <?php 
            if($mascota['horario']){
                echo 'Horario: '.$mascota['horario'].'';
            }
            if($mascota['link']){
                echo '<a class="gristxt" title="" href="'.$mascota['link'].'">'.$mascota['link'].'</a>';
            }
            ?>
        </div>
        <div style="margin-top:20px;" >
            <h4>Descripci&oacute;n</h4>
            <p class="descripcion"><?php echo htmlEncodeText($mascota['descripcion']);?></p>
        </div>
        <a href="http://www.facebook.com/sharer.php?u=/<?php echo DOMAIN.$controller.'/'.$mascota['id'];?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <img src="<?php echo MEDIA.'facebook_share.png'; ?>"</a>
        <div style="margin-top:20px;" class="preguntas">
            <h4>Preguntas</h4>
            <ol>
                <li>
                    <div>
                        <form method="post" action="/pregunta/publicarPregunta">
                            <textarea onblur="Preguntas.blur(this);" onfocus="Preguntas.focus(this);" name="question" style="width:100%;height:30px;"placeholder="Escribe tu pregunta"></textarea>
                            <input type="hidden" value="<?php echo $mascota['id'];?>" name="publication_id"/>
                            <input type="hidden" value="mascota" name="_table"/>
                            <button style="display:none;margin:10px 0px;">Publicar</button>
                        </form>
                    </div>
                </li>
                <?php 
                foreach($pregunta as $row){
                    echo '<li>';
                    echo '<i class="icon-comment"></i>'.$row['question'].' <span style="float:right">'.fecha($row['question_timestamp']).'</span>';
                    if(!empty($row['answer'])){
                        echo '<div class="answer"><i class="icon-comments"></i>'.$row['answer'].' <span style="float:right">'.fecha($row['answer_timestamp']).'</span></div>';
                    }
                    echo '</li>';
                }
                ?>
            </ol>
        </div>
    </div>
</div>


<script>
    function enlargeImage(elem){
        var src = $(elem).attr('src');
        $('.img_box_xl').find('img').attr('src',src);
    }
</script>
