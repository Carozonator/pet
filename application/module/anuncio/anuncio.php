
<div class="main-content_container single_publication" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo $data['titulo'];?>
            <a style="float:right;margin-top:-3px;" href="http://www.facebook.com/sharer.php?u=<?php echo DOMAIN.'/'.$controller.'/'.$data['id'];?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <img style="width:100px;" src="<?php echo MEDIA.'facebook_share.png'; ?>"/>
             </a>
        </h2>
        <div style="float:right;max-height:400px;width:<?php echo (count($foto)>=4?'300':'150'); ?>px;overflow:auto;">
            <?php 
                foreach($foto as $f){ ?>
                
                <div class="img_box_small" >
                    <a href="<?php echo MEDIA.'upload/'.$f['usuario'].'/'.$f['name']; ?>" data-lightbox="roadtrip" >
                        <img alt="<?php echo $data['nombre_original'];?>" src="<?php echo MEDIA.'upload/'.$f['usuario'].'/thumb_'.$f['name']; ?>">
                    </a>
                </div>
            <?php } ?>
            </div>
        <div style="padding-top:20px;min-height:300px;">
            <div class="img_box_xl" style="margin-right:20px;">
                
                <?php 
                if(empty($foto[0]['name'])){
                    $src = "/public/vendor/dropzone/images/spritemap.jpg";
                }else{
                    $src = MEDIA.'upload/'.$foto[0]['usuario'].'/'.$foto[0]['name'];
                }
                ?>
                
                <img onclick="" alt="<?php echo $data['nombre_original'];?>" src="<?php echo $src; ?>">
            </div>
            <div style="display:inline-block" class="single_item">
                <h2 style="padding-bottom:20px;"><?php echo strtoupper($data['tab']);?></h2>
                
                <h5>Direcc&iacute;on:</h5>
                <p class="gristxt"><?php echo displayLocation($data['ciudad_barrio'],$data['departamento'],$data['direccion'],'<br/>');?></p><br/>
                
                <?php if(!empty($data['horario'])){ ?>
                <h5>Horario:</h5>
                <p class="gristxt"><?php echo ucfirst($data['horario']);?></p><br/>
                <?php } ?>
                
                <?php if(!empty($data['telefono'])){ ?>
                <h5>Telefono:</h5>
                <p class="gristxt"><?php echo ucfirst($data['telefono']);?></p><br/>
                <?php } ?>
                <button onclick="Contactar.show(<?php echo $data['usuario']; ?>)" style="">Contactar</button>
                <?php if($_SESSION['user']->id==$data['usuario']){ ?>
                    <form style="margin-top:20px;"method="GET" action="/anuncio/editar/<?php echo $data['id'];?>/">
                        <input type="hidden" value="<?php echo $data['sub_tab'];?>" name="tab"/>
                        <input type="submit" value="Editar"/>
                    </form>
                <?php } ?>
            </div>
        </div>
            <div style="margin-top:40px;" class="description">
                <h4>Descripci&oacute;n</h4>
                <div class="wrapper">
                    <p class="descripcion"><?php echo htmlEncodeText($data['descripcion']);?></p>
                </div>
            </div>
            
            
            
            <?php include ROOT.'application/include/pregunta.php'; ?>
        
        </div>
    </div>
</div>






