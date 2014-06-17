<?php
?>
<div class="main-content_container">
    <div class="account">
    <ul>
        
    <?php 
        foreach($publicados as $row){
            if(strcmp($row->status,$_GET['status'])!==0){
                continue;
            }
    ?>
        <li style="position:relative">
            <div style="" class="thumb">
                <a title="<?php echo $row->titulo;?>" href="/mascota/<?php echo $row->id;?>">
                    <img alt="<?php echo $row->nombre_original;?>" style="width:100%;height:100%;" src="<?php echo MEDIA.'upload/'.$row->foto_1; ?>">
                </a>
                
            </div>
            <div style="margin:10px;display:inline-block;position:absolute;top:0px;font-size:15px;">
                <span><?php echo $row->titulo;?></span><br/>
                <span style="font-size:12px;">$<?php echo $row->precio;?></span>
            </div>
            <div style="position:absolute;right:0px;top:0px;">
                 <form style="display:inline;" method="POST" action="/comprar/delete/">
                    <input type="hidden" name="id" value="<?php echo $row->id;?>"/>
                    <button style="margin-left:10px;">Borrar</button>
                </form>
            </div>
        </li>
        <?php } ?>
    </ul>
    </div>
</div>