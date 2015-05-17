<div class="main-content_container single_publication" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;color:#9C2490">
            <?php echo $mascota['titulo'];?>
             <a style="float:right;margin-top:-3px;" href="http://www.facebook.com/sharer.php?u=<?php echo DOMAIN.'/'.$controller.'/'.$mascota['id'];?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <img style="width:100px;" src="<?php echo MEDIA.'facebook_share.png'; ?>"/>
             </a>
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
                
                <?php 
                if(empty($foto[0]['name'])){
                    $src = "/public/vendor/dropzone/images/spritemap.jpg";
                }else{
                    $src = MEDIA.'upload/'.$row['foto_usuario'].'/thumb_'.$row['foto_name'];
                    $src = MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name'];
                }
                ?>
                
                <img alt="<?php echo $mascota['nombre_original'];?>" src="<?php echo $src; ?>">
            </div>
            <div style="display:inline-block">
                <h2 style="padding-bottom:20px;">
                    <!--<?php echo strtoupper($mascota['tab']);?>-->
                </h2>
                <h5>Direcc&iacute;on:</h5>
                
                <p class="gristxt"><?php echo (!empty($mascota['ciudad_barrio'])?htmlEncodeText(ucfirst($mascota['ciudad_barrio'])).", ":"");?><?php echo htmlEncodeText(ucfirst($mascota['departamento']));?></p>
                <div class="precio" style="font-size:20px;">
                    <?php 
                    $no_precio = array('encontrado','perdido','adoptar');
                    if(!in_array($mascota['tab'],$no_precio)){
                        echo moneda($mascota['moneda']).precio($mascota['precio']);
                    }   
                    ?>
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
            
            <?php 
            
                switch($mascota['tab']){
                    case 'encontrado':
                        $fecha_text = 'Se encontró el día';
                        break;
                    case 'perdido':
                        $fecha_text = 'Se perdio el día';
                        break;
                    default:
                        $fecha_text = 'Fecha de nacimiento';
                }
            
                $details = array(
                    array($GLOBALS['raza_o_animal'][$mascota['animal']],ucfirst($mascota['animal_detail'])),
                    array('Tamaño',ucfirst($mascota['tamano'])),
                    array('Sexo',ucfirst($mascota['sexo'])),
                    array($fecha_text,ucfirst($mascota['fecha'])),
                    array('Pedigree',ucfirst($mascota['pedigree'])),
                    array('Criadero',ucfirst($mascota['criadero'])),
                );
                foreach($details as $row){
                    if(!empty($row[1])){
                        echo '<span class="gristxt_1">'.$row[0].':</span> '.$row[1].'<br/>';
                    }
                }
            ?>
            <?php 
            if($mascota['horario']){
                echo 'Horario: '.$mascota['horario'].'';
            }
            if($mascota['link']){
                echo '<a class="gristxt" title="" href="'.$mascota['link'].'">'.$mascota['link'].'</a>';
            }
            ?>
        </div>
        <div style="margin-top:20px;" class="description">
            <h4>Descripci&oacute;n</h4>
            <div class="wrapper">
                <p class="descripcion"><?php echo htmlEncodeText($mascota['descripcion']);?></p>
            </div>
        </div>
       
        <div style="margin-top:20px;" class="preguntas">
            <h4>Preguntas</h4>
            <ol>
                <?php 
                // Do not allow to post question if you publish it
                if($_SESSION['user']->id !== $mascota['usuario']) { ?>
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
                <?php } ?>
                <?php 
                foreach($pregunta as $row){
                    echo '<li>';
                    echo '<i class="icon-comment"></i>'.$row['question'].' <span style="float:right">'.fecha($row['question_timestamp']).'</span>';
                    if(!empty($row['answer'])){
                        echo '<div class="answer"><i class="icon-comments"></i>'.$row['answer'].' <span style="float:right">'.fecha($row['answer_timestamp']).'</span></div>';
                    }else if($_SESSION['user']->id === $mascota['usuario']){
                        ?>
                        <div>
                            <form method="post" action="/pregunta/publicarRespuesta">
                                <textarea onblur="Preguntas.blur(this);" onfocus="Preguntas.focus(this);" name="answer" style="width:100%;height:30px;"placeholder="Escribe tu respuesta"></textarea>
                                <input type="hidden" value="<?php echo $row['id'];?>" name="pregunta_id"/>
                                <button style="display:none;margin:10px 0px;">Publicar Respuesta</button>
                            </form>
                        </div>
                        <?php
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
