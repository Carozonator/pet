<?php 


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

$raza=array('','Akita Inu', 'Alaskan Malamute', 'Barzoi', 
    'Basset Azul de Gascuña', 'Basset Hound', 'Beagle', 'Beagle Harrier', 'Beauceron', 'Bichón Maltés', 'Bobtail',
    'Border Collie', 'Boxer', 'Boyero de Berna', 'Braco Alemán', 'Braco Francés', 'Briard', 'Bull Terrier Inglés', 
    'Bulldog Francés', 'Bulldog Inglés', 'Bullmastiff', 'Cairn Terrier', 'Cane Corso', 'Caniche', 'Cavalier King Charles', 
    'Chihuahua', 'Cimarron', 'Chow Chow', 'Cocker Spaniel Americano', 'Cocker Spaniel Inglés', 'Collie Rough', 'Collie Smooth', 
    'Dálmata', 'Doberman', 'Dogo Argentino', 'Dogo de Burdeos', 'Epagneul Bretón', 'Epagneul Francés', 'Epagneul Japonés', 
    'Fox Terrier', 'Galgo Español', 'Galgo Irlandés', 'Golden Retriever', 'Gordon Setter', 'Gos d\'Atura', 'Gran Danés', 
    'Husky Siberiano', 'Komondor', 'Labrador Retriever', 'Lebrel Afgano', 'Lebrel Polaco', 'Mastiff', 'Mastín de los Pirineos', 
    'Mastín Español', 'Mastín Napolitano', 'Montaña de los Pirineos', 'Norfolk Terrier', 'Norwich Terrier', 'Papillon', 
    'Pastor Alemán', 'Pastor Australiano', 'Pastor Belga', 'Pastor Blanco Suizo', 'Pastor de los Pirineos', 'Pekinés', 
    'Pequeño Azul de Gascuña', 'Pequeño Basset Griffon', 'Pequeño Brabantino', 'Pequeño Perro León', 'Pequeño Perro Ruso', 
    'Pequeño Sabueso Suizo', 'Perdiguero de Burgos', 'Perdiguero Portugués', 'Perro de Agua Español', 'Perro Lobo de Checoslovaquia', 'Pinscher miniatura', 
    'Pit Bull', 'Podenco Canario', 'Podenco Ibicenco', 'Pointer Inglés', 'Presa Canario', 'Pug', 'Rafeiro do Alentejo', 
    'Rottweiler', 'Samoyedo', 'San Bernardo', 'Schnauzer gigante', 'Schnauzer mediano', 'Schnauzer miniatura', 'Scottish Terrier', 
    'Setter Inglés', 'Setter Irlandés', 'Shar Pei', 'Shih Tzu', 'Spitz', 'Springer Spaniel Galés', 'Springer Spaniel Inglés', 
    'Teckel', 'Terranova', 'Weimaraner', 'Westies', 'Whippet', 'Yorkshire Terrier','OTRO');
$opcion = array('Vender'=>'comprar','Poner en adopcion'=>'adoptar','Perdido'=>'perdidos-y-encontrados','Encontrado'=>'perdidos-y-encontrados','Cruzar'=>'cruzar');



?>

<div class="publicar" style="overflow-x:hidden;overflow-y:hidden">
    <div class="publicar_header">
        <ol>
            <li><a href="">Elige qu&eacute; publicar</a></li><li class="publicar_header_arrow">&#10095;</li>
            <li class="ch-wizard-current">Describe tu servicio</li><li class="publicar_header_arrow">&#10095;</li>
            <li class="ch-wizard-step" style="border-right:0;">Publicar</li>
        </ol>
    </div>
    <div  id="publicar_slider" style="position:relative;width:100%;">
        <div class="slides" style="text-align: center;">
            <div  style="position:relative;padding:40px">
                <img onclick="Publicar.tiendaOne(this,'perro');" src="<?php echo MEDIA; ?>mascota_perro.jpg"/>
                <img onclick="Publicar.tiendaOne(this,'gato');" src="<?php echo MEDIA; ?>mascota_gato.jpg"/>
                <img onclick="Publicar.tiendaOne(this,'ave');" src="<?php echo MEDIA; ?>mascota_ave.jpg"/>
                <img onclick="Publicar.tiendaOne(this,'reptil');" src="<?php echo MEDIA; ?>mascota_reptil.jpg"/><br/>
                <img onclick="Publicar.tiendaOne(this,'mamifero');" src="<?php echo MEDIA; ?>mascota_pequenosmamiferos.jpg"/>
                <img onclick="Publicar.tiendaOne(this,'pez');" src="<?php echo MEDIA; ?>mascota_pez.jpg"/>
                <img onclick="Publicar.tiendaOne(this,'otros');" src="<?php echo MEDIA; ?>mascota_otros.jpg"/>
            </div>
        </div>
        <div class="slides" style="position:absolute;left:1000px;width:100%;">
                    <div style="margin:20px;text-align:center">
                        <?php
                        
                        foreach($images as $key => $row){
                            
                            foreach($row as $k=>$r){
                                $src = MEDIA.'tienda/'.$key.'/'.$r;
                                if(substr($r,0,1)!='.'){
                                    echo '<img onclick="Publicar.tiendaTwo(this)" style="display:none" class="'.$key.' tienda" src="'.$src.'"/>';
                                }
                            }
                        }
                        
                        ?>
                    </div>
        </div>
        <div class="slides" style="position:absolute;left:2000px;width:100%;">
            <form action="/publicar/mascota/" method="post" enctype="multipart/form-data">
                <input type="hidden" value="addMascota" name="action"/>
                <div style="position:relative;padding:40px">
                    <div class="publicar_item">
                        <div class="publicar_item_header">Fotos</div>
                        <div class="publicar_sub_item">
                                <label for="file">Elegir foto(s)</label>
                                <input type="file" name="file[]" multiple="multiple" id="selectFile"><br>
                            <!--    <input type="submit" value="submit"/>
                            <label>Elegir foto</label><button>Add Foto</button>-->
                        </div>
                    </div>
                    
                    
                    <div class="publicar_item">
                        <div class="publicar_item_header">Ubicacion y Contacto</div>
                        <div class="publicar_sub_item">
                            <div style="height:45px;width:100%">
                                <label>Departamento </label>
                                <select class="departamento" name="departamento" style="margin-left:-4px;width:300px;">
                                    <option></option>
                                    <?php
                                       $counter = 0;
                                        foreach($GLOBALS['departamento'] as $key=>$row){
                                            echo '<option value="'.$key.'">'.$key.'</option>';
                                            $counter++;
                                        }
                                    ?>
                                </select><br/>
                            </div>
                            <div style="height:45px;width:100%">
                                <label>Ciudad </label>
                                <select class="ciudad" name="ciudad" style="display:none;margin-left:-4px;width:300px;">
                                    <option></option>
                                </select><br/>
                            </div>
                            <div style="height:45px;width:100%">
                                <label>Barrio </label>
                                <select class="barrio" name="barrio" style="display:none;margin-left:-4px;width:300px;">
                                    <option></option>
                                </select><br/>
                            </div>
                            
                        </div>
                    </div>
                   
                    <div class="publicar_item">
                        <div class="publicar_item_header">Descripcion</div>
                        <div class="publicar_sub_item">
                            <label>Precio</label><input name="precio" type="text"/><br/>
                        </div>
                        <div class="publicar_sub_item">
                            <label>Titulo</label><input name="titulo" type="text"/><span class="input_error"></span>
                        </div>
                        <div class="publicar_sub_item">
                            <div>
                                <label style="margin-bottom:10px;">Describe tu producto</label><br/>
                                <div style="position:relative;margin-left:-3px;vertical-align: middle;display:inline-block;width:100%;">
                                    <textarea id="nicedit_text" style="width:100%;height:250px;"></textarea>
                                    <span style="position:absolute;top:0px;right:0px;" class="input_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <button onclick="Publicar.submit(this);return false;">Publicar</button>
                    </div>
                </div>
                <div style="clear:both"></div>
            </form>
        </div>
        <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
</div>
<div style="clear:both"></div>
<script>
    $(document).ready(function(){
        $("select.raza").select2({
            placeholder: "Eligue Raza",
            allowClear: false
        });
        $(document).ready(function(){
        nicEditors.allTextAreas();
        
        $("select.departamento").select2({
            placeholder: "Eligue Departamento",
            allowClear: false,
            
        });
        
        
        
        $("select.ciudad").select2({
            placeholder: "Eligue Ciudad",
            allowClear: false,
            enable:false,
            readonly:true
        });
        
        
        
        $("select.departamento").select2().on('change', function(e){
            var type;
            if(e.val=='Montevideo'){
                $('.barrio').show();
                $('.ciudad').hide();
                type='barrio';
            }else{
                $('.barrio').hide();
                $('.ciudad').show();
                type='ciudad';
            }
            $('select.'+type).html('');
            var data = Publicar.departamento[e.val]
            for(var i in data){
                    $('.'+type).append('<option value="' + data[i]+ '">'+data[i]+'</option>');
            }
        });
        
        
        $("select.barrio").select2({
            placeholder: "Eligue Barrio",
            allowClear: false
        });
        
    });
    })
</script>

