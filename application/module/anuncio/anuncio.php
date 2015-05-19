
<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo $anuncio['titulo'];?>
            <a style="float:right;margin-top:-3px;" href="http://www.facebook.com/sharer.php?u=<?php echo DOMAIN.'/'.$controller.'/'.$anuncio['id'];?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <img style="width:100px;" src="<?php echo MEDIA.'facebook_share.png'; ?>"/>
             </a>
        </h2>
        <div style="float:right;max-height:400px;width:<?php echo (count($foto)>=4?'300':'150'); ?>px;overflow:auto;">
            <?php 
                foreach($foto as $f){ ?>
                
                <div class="img_box_small" >
                    <a href="<?php echo MEDIA.'upload/'.$f['usuario'].'/'.$f['name']; ?>" data-lightbox="roadtrip" >
                        <img alt="<?php echo $anuncio['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$f['usuario'].'/thumb_'.$f['name']; ?>">
                    </a>
                </div>
            <?php } ?>
            </div>
            <div class="img_box_xl" style="margin-right:20px;">
                <img onclick="" alt="<?php echo $anuncio['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name']; ?>">
            </div>
            <div style="display:inline-block" class="single_item">
                <h2 style="padding-bottom:20px;"><?php echo strtoupper($anuncio['tab']);?></h2>
                <h5>Direcc&iacute;on:</h5>
                <p class="gristxt"><?php echo ucfirst($anuncio['direccion']);?><br/><?php echo ucfirst($anuncio['ciudad_barrio']);?>, <?php echo ucfirst($anuncio['departamento']);?></p><br/>
                <h5>Telefono:</h5>
                <p class="gristxt"><?php echo ucfirst($anuncio['telefono']);?></p><br/>
                <button onclick="Contactar.show(<?php echo $anuncio['usuario']; ?>)" style="">Contactar</button>
            </div>
            <div style="margin-top:20px;">
                <h4>Informaci&oacute;n de <?php echo $anuncio['titulo'];?></h4>
                <?php echo $anuncio['descripcion'];?>
            </div>
            <div style="margin-top:20px;">
                <h4>Horario</h4>
                <?php echo $anuncio['horario'];?><br/>
            </div>
            <div style="margin-top:20px;" class="preguntas">
            <h4>Preguntas</h4>
            <ol>
                <li>
                    <div>
                        <form method="post" action="/pregunta/publicarPregunta">
                            <textarea onblur="Preguntas.blur(this);" onfocus="Preguntas.focus(this);" name="question" style="width:100%;height:30px;"placeholder="Escribe tu pregunta"></textarea>
                            <input type="hidden" value="<?php echo $anuncio['id'];?>" name="publication_id"/>
                            <input type="hidden" value="anuncio" name="_table"/>
                            <button style="display:none;margin:10px 0px;">Publicar</button>
                        </form>
                    </div>
                </li>
                <?php 
                foreach($pregunta as $row){
                    echo '<li>';
                    echo '<i class="icon-comment"></i><span>'.$row['question'].'<span>';
                    if(!empty($row['answer'])){
                        $date = date("F j, g:i a",$row['answer_timestamp']);
                        echo '<div class="answer"><i class="icon-comments"></i>'.$row['answer'].'<span class="date">'.$date.'</span></div>';
                    }
                    echo '</li>';
                }
                ?>
            </ol>
        </div>
        </div>
    </div>
</div>






