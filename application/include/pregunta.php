<?php if(count($pregunta)!=0 || $_SESSION['user']->id !== $data['usuario']): ?>

<div style="margin-top:20px;" class="preguntas">
    <h4>Preguntas</h4>
    <ol>
        <?php 
        // Do not allow to post question if you publish it
        if($_SESSION['user']->id !== $data['usuario']) { ?>
        <li>
            <div>
                <form method="post" action="/pregunta/publicarPregunta">
                    <textarea onblur="Preguntas.blur(this);" onfocus="Preguntas.focus(this);" name="question" style="width:100%;height:30px;"placeholder="Escribe tu pregunta"></textarea>
                    <input type="hidden" value="<?php echo $data['id'];?>" name="publication_id"/>
                    <input type="hidden" value="<?php echo $controller; ?>" name="_table"/>
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
            }else if($_SESSION['user']->id === $data['usuario']){
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
<?php endif; ?>