<?php
?>
<div class="main-content_container">
    <div class="account">
    <ul>
        
    <?php 
        foreach($publicados as $key=>$table){
            if(count($table)>=1){
                echo '<h3 style="padding-top:10px;">'.ucfirst($key).'s</h3>';
            }
        foreach($table as $row){
            if(strcmp($row->status,$_GET['status'])!==0){
                continue;
            }
    ?>
        <li style="position:relative;padding-bottom:5px;">
            <div style="" class="thumb">
                <a title="<?php echo $row->titulo;?>" href="/<?php echo $key;?>/<?php echo $row->id;?>">
                    <img alt="<?php echo $row->nombre_original;?>" style="width:100%;height:100%;" src="<?php echo MEDIA.'upload/'.$row->foto_1; ?>">
                </a>
                
            </div>
            <div style="margin:10px;display:inline-block;position:absolute;top:0px;font-size:15px;">
                <span><?php echo $row->titulo;?></span><br/>
                <span style="font-size:12px;">$<?php echo $row->precio;?></span>
            </div>
            <div style="position:absolute;right:0px;top:0px;">
                 <form style="display:inline;" method="POST" action="/publicar/delete/">
                    <input type="hidden" name="id" value="<?php echo $row->id;?>"/>
                    <input type="hidden" name="table" value="<?php echo $key;?>"/>
                    <button style="margin-left:10px;">Borrar</button>
                </form>
            </div>
        </li>
        <?php }
        }
        ?>
    </ul>
    </div>
</div>