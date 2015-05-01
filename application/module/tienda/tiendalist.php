
<?php 
$raza_o_animal = array('perro'=>'Raza','gato'=>'Raza','mamifero'=>'Animal','pez'=>'Animal','mamifero'=>'Animal','ave'=>'Animal','reptil'=>'Animal','otro'=>'Animal');


$dir = ROOT.MEDIA."/tienda";
$files = scandir($dir);
$images = array();
foreach($files as $row){
    if($row =='.' || $row=='..' || $row=='.DS_Store'){
        continue;
    }
    $dir = ROOT.MEDIA."/tienda/".$row;
    $images[$row] = scandir($dir);
}



?>
<div style="margin-top:40px">
    <div class="publicar" style='margin:0px 20px 0px 0px;width:20%;float:left;'>
        <form action="" method="GET" id="filter">
            <!--<input type="hidden" value="<?php echo $animal; ?>" name="animal"/>
            <input type="hidden" value="<?php echo $tab; ?>" name="tab"/>-->
            <!--
            <div class="filter_title">
                <div class="publicar_item_header"><?php echo 'Animal'; ?><span onclick="Filter.unfilter('animal')">x</span></div>
            </div>
            <div class="filter_desc">
                <select class="animal" name="animal" style="width:100%;">
                    <option></option>
                    <?php
                        foreach($GLOBALS['nav_menu']['comprar'] as $r){
                            foreach($r as $key=>$other){
                                if($_REQUEST['animal']==$key){
                                    echo '<option value="'.$key.'" selected>'.ucfirst($key).'</option>';
                                }
                                else{
                                    echo '<option value="'.$key.'">'.ucfirst($key).'</option>';
                                }
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="filter_title" style="<?php if(empty($_REQUEST['animal'])){echo 'display:none;';}?>">
                <div class="publicar_item_header producto"><?php echo 'Producto'; ?><span onclick="Filter.unfilter('tab')">x</span></div>
            </div>-->
            <!--
            <div class="filter_desc producto" style="<?php if(empty($_REQUEST['animal'])){echo 'display:none;';}?>">
                <select class="tab" name="tab" style="width:100%;">
                    <option></option>
                    <?php
                        foreach($GLOBALS['producto'][$_REQUEST['animal']] as $key=>$r){
                            if($_REQUEST['tab']==$r){
                                echo '<option value="'.$r.'" selected>'.ucfirst($r).'</option>';
                            }
                            else{
                                echo '<option value="'.$r.'">'.ucfirst($r).'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            -->
            
            
            
            
            
            
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
            
            
            
            
            <div class="filter_title"><div class="publicar_item_header">Productos<span onclick="Filter.unfilter('tab')">x</span></div></div>
            <div class="filter_desc">
                <?php
                       /* 
                if(!empty($_REQUEST['tab'])){
                    echo ucfirst(str_replace("_"," ",$_REQUEST['tab']));
                }else{*/
                    $counter=0;
                        foreach($images[$animal] as $k=>$r){
                            $counter++;
                            $checked = (in_array(array_shift(explode('.', $r)),$_REQUEST['tab'])===true?'checked':'');
                            if(substr($r,0,1)!='.'){
                                $display = ucfirst(str_replace("_"," ",array_shift(explode('.', $r))));
                                ?>
                                <div class="squaredOne">
                                        <input class="tab_checkbox" onclick="Filter.submit()" <?php echo $checked; ?> type="checkbox" value="<?php echo array_shift(explode('.', $r)); ?>" id="squaredOne_<?php echo $counter;?>" name="tab[]" />
                                        <label for="squaredOne_<?php echo $counter;?>"></label>
                                        <span onclick="checkboxSibling(this)"><?php echo $display; ?></span>
                                </div>
                                <!--<input onclick="Filter.submit()" type="checkbox" name="tab" value="'.array_shift(explode('.', $r)).'"> '.$display.'<br/>';-->
                                <?php 
                            }
                        }
                //}
                ?>
            </div>
        </form>
    </div>
    <div style="width:75%;position:relative;float:right;margin-bottom:60px;min-height:700px;" class="img150 results">

        <?php
        if(empty($data)){
            echo '<div style="font-weigth:bold;text-align:center;font-size:15px;">No hay productos en esta categoria</div>';
        }
        else{
            foreach($data as $row){
            ?>

                    <div class="mascota-list">
                        <div style="float:left;margin-right:10px;" class="thumb">
                            <a title="<?php echo $row['titulo'];?>" href="/producto/<?php echo $row['id'];?>" >
                                <img alt="<?php echo $row['nombre_original'];?>" style="width:100%;height:100%;" src="<?php echo MEDIA.'upload/'.$row['foto_usuario'].'/thumb_'.$row['foto_name']; ?>">
                            </a>
                        </div>
                        <div class="overflow mbottom">
                            <!--<div class="fright gristxt">1 voto <span class="excelente">10,00</span></div>-->
                            <h3>
                                <a class="bigtxt" style="color:#9C2490" href="/producto/<?php echo $row['id'];?>"><?php echo $row['titulo'];?></a>
                            </h3>
                            <div class="precio" style="font-size:20px;position:absolute;left:600px;top:70px;" class="">
                                <?php echo moneda($row['moneda']); ?><?php echo number_format($row['precio'],0,',','.'); ?>
                            </div>
                            <p><span class="gristxt_1">Localizacion:</span> <?php echo htmlEncodeText(ucfirst($row['ciudad_barrio']));?>, <?php echo htmlEncodeText(ucfirst($row['departamento']));?></p>
                            <?php 

                            if($row['horario']){
                                echo '<p class="gristxt nolink" title="" href="#">Horario: '.$row['horario'].'</p>';
                            }
                            if($row['link']){
                                echo '<a class="gristxt" title="" href="'.$row['link'].'">'.$row['link'].'</a>';
                            }
                            ?>
                            <p class="" title="" href="#"><?php echo $row['descripcion']; ?></p>
                            <div style="position:absolute;right:0px;top:0px;">
                                 <form style="display:inline;" method="POST" action="/comprar/delete/">
                                    <!--<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>-->
                                    <!--<button style="margin-left:10px;">Borrar</button>-->
                                </form>
                            </div>
                        </div>
                        <div style="clear:both"> </div>
                    </div>
        

            <?php
            }
        } ?>
        
        <?php include ROOT.'application/include/pagination.php'; ?>
        
    </div><div style="clear:both"></div></div>
<style>
input[type=checkbox] {
    visibility: hidden;
}

/* SQUARED ONE */
.squaredOne span{
    position:absolute;
    top:0px;
    left:35px;
    font-size:14px;
    width:150px;
    cursor: pointer;
}
.squaredOne {
	width: 22px;
	height: 22px;
        margin: 5px;
	position: relative;
        border:1px solid lightgrey;
}

.squaredOne label {
	cursor: pointer;
	position: absolute;
	width: 16px;
	height: 16px;
	left: 3px;
	top: 3px;
        background:white;
        /*
	background: -webkit-linear-gradient(top, #222 0%, #45484d 100%);
	background: -moz-linear-gradient(top, #222 0%, #45484d 100%);
	background: -o-linear-gradient(top, #222 0%, #45484d 100%);
	background: -ms-linear-gradient(top, #222 0%, #45484d 100%);
	background: linear-gradient(top, #222 0%, #45484d 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#222', endColorstr='#45484d',GradientType=0 );
        */
}

.squaredOne label:after {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: alpha(opacity=0);
	opacity: 0;
	content: '';
	position: absolute;
	width: 16px;
	height: 16px;
	background: #e552d6; /* Old browsers */
        background: -moz-linear-gradient(top,  #e552d6 0%, #e209c9 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e552d6), color-stop(100%,#e209c9)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  #e552d6 0%,#e209c9 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  #e552d6 0%,#e209c9 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  #e552d6 0%,#e209c9 100%); /* IE10+ */
        background: linear-gradient(to bottom,  #e552d6 0%,#e209c9 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e552d6', endColorstr='#e209c9',GradientType=0 ); /* IE6-9 */

	-webkit-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
	-moz-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
	box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
}

.squaredOne span:hover::after {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
	filter: alpha(opacity=30);
	opacity: 0.7;
}

.squaredOne:hover label::after {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
	filter: alpha(opacity=30);
	opacity: 0.7;
}

.squaredOne input[type=checkbox]:checked + label:after {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: alpha(opacity=100);
	opacity: 1;
}


</style>
<script>
    function checkboxSibling(elem){
        var input = $(elem).siblings('input');
        var val = !input.is(":checked");
        input.prop('checked',val);
        input.trigger('click');
    }
</script>