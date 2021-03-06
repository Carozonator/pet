<?php
?>
<div class="main-content_container">
    <div class="account">
    <ul>
        
    <?php 
        $total=0;
        foreach($publicados as $key=>$table){
            $counter=0;
        foreach($table as $row){
            
            if(strcmp($row->status,$_GET['status'])!==0){
                continue;
            }
            $total++;
            $counter++;
            if($counter==1){
                echo '<h3 style="padding-top:10px;">'.ucfirst($key).'s</h3>';
            }
    ?>
        <li style="position:relative;border:1px solid lightgrey;border-radius:5px;margin:10px;padding:10px 10px 5px 10px;">
            <div style="float:left">
                <div style="width:100px;height:100px" class="thumb">
                    <a title="<?php echo $row->titulo;?>" href="/<?php echo $key;?>/<?php echo $row->id;?>">
                        <?php 
                        if(empty($row->foto_name)){
                            $src = "/public/vendor/dropzone/images/spritemap.jpg";
                        }else{
                            $src = MEDIA.'upload/'.$row->usuario.'/thumb_'.$row->foto_name;
                        }
                        ?>
                        <img alt="<?php echo $row->nombre_original;?>" src="<?php echo $src; ?>" style="width:100%;height:100%;" >
                    </a>
                </div>
                <div style="margin:10px;display:inline-block;vertical-align:top;font-size:15px;">
                    <span style="font-size:16px;font-weight:bold"><?php echo $row->titulo;?></span><br/>
                    <span style="font-size:14px;font-weight:bold">
                        <?php 
                        echo monedaPercio($row->moneda,$row->precio);
                        ?>
                    </span>
                </div>
            </div>
            <div style="float:right;">
                <!--<button style="margin-left:10px;height:25px;"><i class="icon-wrench"></i></button>-->
                
                <form style="display:inline;" method="POST" action="/publicar/modify/">
                   <input type="hidden" name="id" value="<?php echo $row->id;?>"/>
                   <input type="hidden" name="tab" value="<?php 
                   if($key=='mascota'){
                        echo $row->tab;
                   }elseif($key=='anuncio'){
                       echo $row->sub_tab;
                   }elseif($key=='producto'){
                       echo $row->animal;
                   }
                   
                   ?>"/>
                   <input type="hidden" name="table" value="<?php echo $key;?>"/>
                   <select name="event" style="width:100px;">
                        <option></option>
                        <option value="activo">Activar</option>
                        <option value="pausado">Pausar</option>
                        <option value="finalizado">Finalizar</option>
                        <option value="editar">Editar</option>
                        <option value="borrar">Borrar</option>
                    </select>
                </form>
            </div>
            <div style="clear: both"></div>
        </li>
        <?php }
        }
        if($total==0){
            $map=array('activo'=>'activas','pausado'=>'pausadas','finalizado'=>'finalizadas');
            echo '<li style="text-align:center">No hay publicaciones '.$map[$_REQUEST['status']].'</li>';
        }
        ?>
    </ul>
    </div>
</div>
<style>
    li + h3{
        border-top:1px solid lightgrey;
        margin-top:30px;
    }
</style>
<script>
    $('select').select2({
        minimumResultsForSearch: -1,
        placeholder:'Opciones',
        onChange:function(){
            alert('here');
        }
    });
    $('select').on('change',function(){$(this).closest('form').submit()});
</script>