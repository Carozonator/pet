<div class="main-content_container single_publication" style="padding:30px">
    <div style="margin-bottom: 30px;position:relative;">
        <h2 style="border-bottom: 1px solid grey;padding:5px;">
            <?php echo $data['titulo'];?>
            <a style="float:right;margin-top:-3px;" href="http://www.facebook.com/sharer.php?u=<?php echo DOMAIN.'/'.$controller.'/'.$data['id'];?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <img style="width:100px;" src="<?php echo MEDIA.'facebook_share.png'; ?>"/>
             </a>
        </h2>
        
        <div style="float:right;max-height:400px;width:<?php echo (count($foto)>=4?'300':'150'); ?>px;overflow:auto;">
        <?php foreach($foto as $f){ ?>
            <div class="img_box_small">
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
                
                <img alt="<?php echo $data['nombre_original'];?>" src="<?php echo $src; ?>">
            </div>
            <div style="display:inline-block">
                <h2 style="padding-bottom:20px;"><?php echo strtoupper($data['tab']);?></h2>
                <h5 >Direcc&iacute;on:</h5>
                <p class="gristxt"><?php echo (!empty($data['ciudad_barrio'])?ucfirst($data['ciudad_barrio']).", ":"");?><?php echo ucfirst($data['departamento']);?></p>
                <p><?php echo (!empty($data['vendedor_id'])?('Producto ID: '.$data['vendedor_id']):"");?></p>
                
                <div class="precio" style="font-size:20px;">
                    <?php 
                    echo moneda($data['moneda']).precio($data['precio']);
                    ?>
                </div>
                <br/>
                
                
                
                <button onclick="Contactar.show(<?php echo $data['usuario']; ?>)">Contactar</button>
                <?php if($_SESSION['user']->id==$data['usuario']){ ?>
                    <form style="margin-top:20px;"method="GET" action="/producto/editar/<?php echo $data['id'];?>/">
                        <input type="hidden" value="<?php echo $data['animal'];?>" name="tab"/>
                        <input type="submit" value="Editar"/>
                    </form>
                <?php } ?>
            </div>
        </div>
            
            
        
        <!--
        <div class="item_datos" style="margin-top:20px;">
            <h4>Datos</h4>
            <?php 
            if($data['link']){
                echo '<a class="gristxt" title="" href="'.$data['link'].'">'.$data['link'].'</a>';
            }
            ?>
        </div>
        -->
        <div style="margin-top:20px;" class="description">
            <h4>Descripci&oacute;n</h4>
            <div class="wrapper">
                <p class="descripcion"><?php echo htmlEncodeText($data['descripcion']);?></p>
            </div>
        </div>
        
        <?php include ROOT.'application/include/pregunta.php'; ?>
        
    </div>
</div>
<script>
    function enlargeImage(elem){
        var src = $(elem).attr('src');
        $('.img_box_xl').find('img').attr('src',src);
    }
</script>
