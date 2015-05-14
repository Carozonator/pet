<?php 
$raza_o_animal = array('perro'=>'Raza','gato'=>'Raza','mamifero'=>'Animal','pez'=>'Animal','mamifero'=>'Animal','ave'=>'Animal','reptil'=>'Animal','otro'=>'Animal');

$order = array('reciente'=>'Recientes','barato'=>'Menor precio','caro'=>'Mayor precio','visitas'=>'M&aacutes visitados');

?>


<div style="">
<div class="wrapper-dropdown-5 orden" style="">
    <div class="dropdown-menu" style="width:90%;"><i class="icon-sort"></i> 
        <?php echo (!empty($_REQUEST['orden'])?$order[$_REQUEST['orden']]:'Recientes'); ?>
        <ul style=""class="dropdown">
                <?php foreach($order as $key=>$o){ 
                    echo '<li><a onclick="Filter.sort(\''.$key.'\');">'.$o.'</a></li>';
                } ?>
        </ul>
    </div>
</div>
</div>

<div style="margin-top:40px">
    <div class="publicar" style='margin:30px 20px 0px 0px;width:20%;float:left;'>
        <form action="" method="GET" id="filter">
            <!--<input type="hidden" value="<?php echo $animal; ?>" name="animal"/>-->
            <input type="hidden" value="<?php echo $_REQUEST['orden']; ?>" name="orden" class="ordenar_filtro"/>
            <!--<input type="hidden" value="<?php echo $tab; ?>" name="tab"/>-->
            <div class="filter_title" style="border:0px"><div class="publicar_item_header">Edad<span onclick="Filter.unfilter('edad')">x</span></div></div>
            <div class="filter_desc">
                <input onclick="Filter.submit()" <?php if($_REQUEST['edad']=='junior'){echo 'checked';}?> type="radio" value="junior" name="edad"/> Junior<br/>
                <input onclick="Filter.submit()" <?php if($_REQUEST['edad']=='adulto'){echo 'checked';}?> type="radio" value="adulto" name="edad"/> Adulto<br/>
                <input onclick="Filter.submit()" <?php if($_REQUEST['edad']=='senior'){echo 'checked';}?> type="radio" value="senior" name="edad"/> Senior<br/>
            </div>
            
            <div class="filter_title"><div class="publicar_item_header">Sexo<span onclick="Filter.unfilter('sexo')">x</span></div></div>
            <div class="filter_desc">
                <input onclick="Filter.submit()" <?php if($_REQUEST['sexo']=='macho'){echo 'checked';}?> type="radio" value="macho" name="sexo"/> Macho<br/>
                <input onclick="Filter.submit()" <?php if($_REQUEST['sexo']=='hembra'){echo 'checked';}?> type="radio" value="hembra" name="sexo"/> Hembra<br/>
            </div>
            <?php if(($animal=='perro' || $animal=='gato') && ($tab=='comprar' || $tab=='cruzar')){?>
            <div class="filter_title"><div class="publicar_item_header">Con Pedigree<span onclick="Filter.unfilter('pedigree')">x</span></div></div>
            <div class="filter_desc">
                <input onclick="Filter.submit()" <?php if($_REQUEST['pedigree']=='si'){echo 'checked';}?> type="radio" value="si" name="pedigree"/> Si<br/>
                <input onclick="Filter.submit()" <?php if($_REQUEST['pedigree']=='no'){echo 'checked';}?> type="radio" value="no" name="pedigree"/> No<br/>
            </div>
            <?php } ?>
            <?php if($tab=='comprar') { ?>
            <div class="filter_title"><div class="publicar_item_header">De Criadero<span onclick="Filter.unfilter('criadero')">x</span></div></div>
            <div class="filter_desc">
                <input onclick="Filter.submit()" <?php if($_REQUEST['criadero']=='si'){echo 'checked';}?> type="radio" value="si" name="criadero"/> Si<br/>
                <input onclick="Filter.submit()" <?php if($_REQUEST['criadero']=='no'){echo 'checked';}?> type="radio" value="no" name="criadero"/> No<br/>
            </div>
            <?php } ?>
            <div class="filter_title"><div class="publicar_item_header"><?php echo $GLOBALS['raza_o_animal'][$animal] ?><span onclick="Filter.unfilter('animal_detail')">x</span></div></div>
            <div class="filter_desc">
                <select class="animal_detail" name="animal_detail" style="width:100%;">
                    <?php
                        if($tab!='comprar' && $animal=='otro'){
                            $animal='otro_todos';
                        }
                        foreach($GLOBALS['raza'][$animal] as $r){
                            if($_REQUEST['animal_detail']==$r){
                                echo '<option selected>'.$r.'</option>';
                            }
                            else{
                                echo '<option>'.$r.'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            
            
            
            <?php if(strcmp($tab,'adoptar')===0){?>
            <div class="filter_title"><div class="publicar_item_header">Refugio<span onclick="Filter.unfilter('refugio')">x</span></div></div>
            <div class="filter_desc">
                <select class="refugio" name="refugio" style="width:100%;">
                    <?php
                        if($tab!='comprar' && $animal=='otro'){
                            $animal='otro_todos';
                        }
                        foreach($GLOBALS['refugio'] as $r){
                            if($_REQUEST['refugio']==$r){
                                echo '<option selected>'.$r.'</option>';
                            }
                            else{
                                echo '<option>'.$r.'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <?php } ?>
            
            
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
    <div style="width:75%;position:relative;float:right;margin-bottom:60px;min-height:700px;" class="img150 results">

        <?php
        if(empty($data)){
            echo '<div style="font-weigth:bold;text-align:center;font-size:15px;">No hay mascotas en esta categoria</div>';
        }
        else{
            foreach($data as $row){
            ?>

                    <div class="mascota-list">
                        <div style="float:left;margin-right:10px;" class="thumb">
                            <a title="<?php echo $row['titulo'];?>" href="/mascota/<?php echo $row['id'];?>" >
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
                        <div class="overflow mbottom">
                            <!--<div class="fright gristxt">1 voto <span class="excelente">10,00</span></div>-->
                            <h3>
                                <a class="bigtxt" style="color:#9C2490" href="/mascota/<?php echo $row['id'];?>"><?php echo $row['titulo'];?></a>
                            </h3>
                            <?php if(strcmp($tab,'comprar')===0){?>
                            <div class="precio" style="font-size:20px;position:absolute;left:600px;top:70px;" class="">
                                <?php echo moneda($row['moneda']); ?><?php echo number_format($row['precio'],0,',','.'); ?>
                            </div>
                            <?php }?>
                            <p><span class="gristxt_1"><?php echo $raza_o_animal[$row['animal']]; ?>:</span> <?php echo ucfirst($row['animal_detail']);?></p>
                            <p><span class="gristxt_1">Localizacion:</span> <?php echo htmlEncodeText(ucfirst($row['ciudad_barrio']));?>, <?php echo htmlEncodeText(ucfirst($row['departamento']));?></p>
                            <p><span class="gristxt_1">Tama&ntilde;o:</span> <?php echo htmlEncodeText(ucfirst($row['tamano']));?></p>
                            <p><span class="gristxt_1">Edad:</span> <?php echo ucfirst($row['edad']);?></p>
                            <p><span class="gristxt_1">Sexo:</span> <?php echo ucfirst($row['sexo']);?></p>
                            <p><span class="gristxt_1">Pedigree:</span> <?php echo ucfirst($row['pedigree']);?> - Criadero: <?php echo ucfirst($row['criadero']);?></p>
                            <?php 

                            if($row['horario']){
                                echo '<p class="gristxt nolink" title="" href="#">Horario: '.$row['horario'].'</p>';
                            }
                            if($row['link']){
                                echo '<a class="gristxt" title="" href="'.$row['link'].'">'.$row['link'].'</a>';
                            }
                            ?>
                            <div style="position:absolute;right:0px;top:0px;">
                                 <form style="display:inline;" method="POST" action="/comprar/delete/">
                                    <!--<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>-->
                                    <!--<button style="margin-left:10px;">Borrar</button>-->
                                </form>
                            </div>
                        </div>
                    </div>


            <?php
            }
        } ?>
        
        <?php include ROOT.'application/include/pagination.php'; ?>
        
    </div>
    <div style="clear:both"></div>
</div>



