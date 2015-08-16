<?php


$order = array('reciente'=>'Recientes','visitas'=>'M&aacutes visitados');

?>








<div class="wrapper-dropdown-5 orden" style="">
    <div class="account-dropdown-menu" style="width:90%;"><i class="icon-sort"></i> 
        <?php echo (!empty($_REQUEST['orden'])?$order[$_REQUEST['orden']]:'Recientes'); ?>
        <ul style=""class="dropdown">
                <?php foreach($order as $key=>$o){ 
                    echo '<li><a onclick="Filter.sort(\''.$key.'\');">'.$o.'</a></li>';
                } ?>
        </ul>
    </div>
</div>


<div style="margin-top:40px">
    <div class="filter_sidebar">
        <form action="" method="GET" id="filter">
            <input type="hidden" value="<?php echo $sub_tab; ?>" name="titulo"/>
            <input type="hidden" value="<?php echo $_REQUEST['orden']; ?>" name="orden" class="ordenar_filtro"/>
            <div class="filter_title"><div class="publicar_item_header">Localizaci&oacute;n<span onclick="Filter.unfilter('departamento')">x</span></div></div>
            <div class="filter_desc">
                <select class="departamento" name="departamento" style="width:100%;">
                    <option></option>
                    <?php
                       $counter = 0;
                        foreach($GLOBALS['departamento'] as $key=>$r){
                            if($_REQUEST['departamento']==$key){
                                echo '<option selected>'.$key.'</option>';
                            }
                            else{
                                echo '<option value="'.$key.'">'.$key.'</option>';
                            }
                            $counter++;
                        }
                    ?>
                </select>
                <div style="width:100%;margin-top:5px;">
                    <select class="ciudad_barrio" name="ciudad_barrio" style="<?php if(empty($_REQUEST['departamento'])){echo 'display:none;';}?>width:100%;">
                        <option></option>
                        <?php
                       $counter = 0;
                        foreach($GLOBALS['departamento'][$_REQUEST['departamento']] as $r){
                            if($_REQUEST['ciudad_barrio']==$r){
                                echo '<option selected>'.$r.'</option>';
                            }
                            else{
                                echo '<option value="'.$r.'">'.$r.'</option>';
                            }
                            $counter++;
                        }
                    ?>
                    </select>
                </div>
                
            </div>
        </form>
    </div>
    
    
    <div class="toggle_filters">
        <button onclick="Filter.toggle()">Mostrar filtros</button>
    </div>
    
    <div class="img150 publication_list">

        <?php
        if(empty($data)){
            echo '<div style="font-weigth:bold;text-align:center;font-size:15px;">No hay anuncios en esta categoria</div>';
        }
        else{
        foreach($data as $row){
        ?>

        <div class="mascota-list">
            <div class="thumb mascota-list-thumb">
                <a title="<?php echo $row['titulo'];?>" href="/anuncio/<?php echo $row['id'];?>" >
                    <?php 
                    if(empty($row['foto_usuario'])){
                        $src = "/public/vendor/dropzone/images/spritemap.jpg";
                    }else{
                        $src = MEDIA.'upload/'.$row['foto_usuario'].'/thumb_'.$row['foto_name'];
                    }
                    ?>
                    <img alt="<?php echo $row['nombre_original'];?>" style="width:100%;height:100%;" src="<?php echo $src; ?>">
                </a>
            </div>
            <div class="overflow mbottom mascota-list-description">
            <h3>
                <a class="bigtxt" style="color:#9C2490" href="/anuncio/<?php echo $row['id'];?>"><?php echo $row['titulo'];?></a>
            </h3>
            <?php 
            
             $details = array(
                array('Direccíon',displayLocation($row['ciudad_barrio'],$row['departamento'],$row['direccion'],', ')),
                array('Horario',ucfirst($row['horario']))
                
            );
            foreach($details as $row){
                if(!empty($row[1])){
                    echo '<p><span class="gristxt_1">'.$row[0].':</span> '.$row[1].'</p>';
                }
            }
                            
            ?>
            <p class="descripcion"><?php echo $row['descripcion'];?></p>
            
            <div style="clear:both;"></div>
        </div>
    </div>
<?php
}
}
echo '</div>';
echo '<div style="clear:both"></div>';
echo '</div>';
?>

