<?php
?>
<div class="main-content_container">
    <div class="account">
    <ul class="preguntas">
    <?php 
        $total = 0;
        foreach($publicados as $key=>$table){
            $counter=0;
        foreach($table as $row){
            $total++;
            $counter++;
            if($counter==1){
                echo '<h3 style="padding-top:10px;">'.ucfirst($key).'s</h3>';
            }
    ?>
        <li style="position:relative;padding-bottom:5px;padding:10px 0px;">
            <div style="width:100px;height:100px" class="thumb">
                <a title="<?php echo $row->titulo;?>" href="/<?php echo $key;?>/<?php echo $row->id;?>">
                    <img alt="<?php echo $row->nombre_original;?>" src="<?php echo MEDIA.'upload/'.$row->usuario.'/thumb_'.$row->foto_name; ?>" style="width:100%;height:100%;" >
                </a>
            </div>
            <div style="margin:10px;display:inline-block;position:absolute;top:0px;font-size:15px;">
                <span><?php echo $row->titulo;?></span><br/>
                <span style="font-size:12px;"><?php echo $row->question;?></span>
            </div>
            <div >
                <form method="post" action="/pregunta/publicarRespuesta">
                    <textarea onblur="Preguntas.blur(this);" onfocus="Preguntas.focus(this);" name="answer" style="width:100%;height:30px;"placeholder="Escribe tu respuesta"></textarea>
                    <input type="hidden" value="<?php echo $row->pregunta_id;?>" name="pregunta_id"/>
                    <button style="display:none;margin:10px 0px;">Publicar</button>
                </form>
            </div>
        </li>
        <?php }
        }
        if($total==0){
            echo '<li style="text-align:center">No hay preguntas para contestar</li>';
        }
        ?>
    </ul>
    </div>
</div>