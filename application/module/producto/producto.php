<div class="main-content_container" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo $producto['titulo'];?>
        </h2>
        <div style="float:right;">
        <?php 
            foreach($foto as $f){ ?>
                <div class="img_box_small" style="margin-right:10px;" class="img_box_small">
                    <a href="<?php echo MEDIA.'upload/'.$f['usuario'].'/'.$f['name']; ?>" data-lightbox="roadtrip" >
                        <img alt="<?php echo $producto['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$f['usuario'].'/thumb_'.$f['name']; ?>">
                    </a>
                </div>
            <?php } ?>
        </div>
        <div style="padding-top:20px;">
            <div class="img_box_xl" style="margin-right:20px;">
                <img alt="<?php echo $producto['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name']; ?>">
            </div>
            <div style="display:inline-block">
                <h2 style="padding-bottom:20px;"><?php echo strtoupper($producto['tab']);?></h2>
                <h5 >Direcc&iacute;on:</h5>
                <p class="gristxt"><?php echo (!empty($producto['ciudad_barrio'])?ucfirst($producto['ciudad_barrio']).", ":"");?><?php echo ucfirst($producto['departamento']);?></p>
                <div class="precio" style="font-size:20px;">
                    <?php 
                    echo moneda($producto['moneda']).precio($producto['precio']);?>
                </div>
                <br/>
                
                
                
                <button onclick="Contactar.show(<?php echo $producto['usuario']; ?>)">Contactar</button>
                <?php if($_SESSION['user']->id==$producto['usuario']){ ?>
                    <form style="margin-top:20px;"method="GET" action="/mascota/editar/<?php echo $producto['id'];?>">
                        <input type="hidden" value="<?php echo $producto['tab'];?>" name="tab"/>
                        <input type="submit" value="Editar"/>
                    </form>
                <?php } ?>
            </div>
        </div>
            
            
        
        <!--
        <div class="item_datos" style="margin-top:20px;">
            <h4>Datos</h4>
            <?php 
            if($producto['link']){
                echo '<a class="gristxt" title="" href="'.$producto['link'].'">'.$producto['link'].'</a>';
            }
            ?>
        </div>
        -->
        <div style="margin-top:20px;">
            <h4>Descripci&oacute;n</h4>
            <p class="descripcion"><?php echo $producto['descripcion'];?></p>
        </div>
        
        <div style="margin-top:20px;" class="preguntas">
            <h4>Preguntas</h4>
            <ol>
                <li>
                    <div>
                        <form method="post" action="/pregunta/publicarPregunta">
                            <textarea onblur="Preguntas.blur(this);" onfocus="Preguntas.focus(this);" name="question" style="width:100%;height:30px;"placeholder="Escribe tu pregunta"></textarea>
                            <input type="hidden" value="<?php echo $producto['id'];?>" name="publication_id"/>
                            <input type="hidden" value="producto" name="_table"/>
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
<script>
    function enlargeImage(elem){
        var src = $(elem).attr('src');
        $('.img_box_xl').find('img').attr('src',src);
    }
</script>
