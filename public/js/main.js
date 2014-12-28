







var Ready = {
    init: function(){
        $("select.ciudad_barrio").select2({
            placeholder: "Eligue Ciudad/Barrio",
            allowClear: false,
            enable:false,
            readonly:true
        });

        $("select.departamento").select2({
            placeholder: "Eligue Departamento",
            allowClear: false,
        }).on('change', function(e){
            $('select.ciudad_barrio').html('');
            var data = Publicar.departamento[e.val];
            $('select.ciudad_barrio').append('<option></option>');
            for(var i in data){
                    $('select.ciudad_barrio').append('<option value="' + data[i]+ '">'+data[i]+'</option>');
            }
            $('.ciudad_barrio').show();
        });






        $("select.animal_detail").select2({
            placeholder: "Eligue Animal/Raza",
            allowClear: false
        });
        
        
        
        
        
        
        
        $("select.animal").select2({
            placeholder: "Eligue Animal",
            allowClear: true
        }).on('change', function(e){
            $('select.tab').html('');
            var data = Publicar.producto[e.val];
            $('select.tab').append('<option></option>');
            for(var i in data){
                    $('select.tab').append('<option value="' + data[i]+ '">'+data[i]+'</option>');
            }
            $('select.tab').show();
        });
        $("select.tab").select2({
            placeholder: "Eligue Producto",
            allowClear: true,
            enable:false,
            readonly:true
        });
        
        
        
        
        
        
        $('select').on('change',function(){Filter.submit()});
    }
}
$(document).ready(function(){Ready.init();});








var Publicar = {
    group:'',/* mascota,producto,anuncio */
    producto:{'perro':["accesorios","transporte","alimentos","camas","casillas","collarez","comederos","correas","jaulas","juguetes","ropa"],
                'gato':["accesorios","transporte","alimentos","camas","casillas","collarez","comederos","juguetes"],
                'ave':["accesorios","alimentos","jaulas","salud"],
                'repitl':["accesorios","alimentos","salud","terrarios","transporte"],
                'mamifero':["accesorios","alimentos","jaulas","juguetes","salud","transporte"],
                'pez':["accesorios","alimentos","parideras","peceras","salud"]},
    departamento:{'Artigas':['Artigas','Bella Union'],
        'Canelones':['Ciudad de la Costa','Las Piedras','Barros Blancos','Pando','La Paz','Canelones','Santa Lucia','Progreso'],
        'Cerro Largo':['Melo','Rio Branco'],
        'Colonia':['Carmelo','Colonia del Sacramento','Juan Lacaze','Nueva Helvecia','Rosario'],
        'Durazno':['Durazno'],
        'Flores':['Trinidad'],
        'Florida':['Florida'],
        'Lavalleja':['Minas'],
        'Maldonado':['Maldonado','San Carlos','Punta Del Este'],
        'Montevideo':["Aguada","Aires Puros","Arroyo Seco","Atahualpa","Barra de Carrasco","Bella Vista","Belvedere","Bolivar","Brazo Oriental","Buceo",
        "Capurro","Carrasco","Casabo","Centro","Cerrito","Cerro","Ciudad Vieja","Cno. Carrasco","Cno. Maldonado","Col&oacute;n","Cord&oacute;n","Goes","Golf","Ituzaing&oacute;",
        "Jacinto Vera","Jardines Hip&oacute;dromo","La Blanqueada","La Colorada","La Comercial","La Figurita","La Teja","Las Acacias","Lezica","Malvin",
	"Malvin Norte","Manga","Marconi","Maro&ntilde;as","Maro&ntilde;as, Curva","Melilla","Montevideo","Nuevo Par&iacute;s","Otras","Pajas Blancas","Palermo","Parque Batlle",
        "Parque Rod&oacute;","Paso Molino","Paso de la Arena","Pe&ntilde;arol","Piedras Blancas","Pocitos","Pocitos Nuevo","Prado","Puerto Buceo","Punta Carretas","Punta Gorda",
        "Punta Rieles","Reducto","Santiago V&aacutezquez","Sayago","Toledo Chico","Tres Cruces","Uni&oacute;n","Villa Biarritz","Villa Col&oacute;n","Villa Dolores","Villa Espa&ntilde;ola",
	"Villa Garc&iacute;a","Villa Mu&ntilde;oz","Villa del Cerro"],
        'Paysandu':['Paysandu'],
        'Rio Negro':['Fray Bentos','Young'],
        'Rivera':['Rivera'],
        'Rocha':['Rocha'],
        'Salto':['Salto'],
        'San Jose':['San Jose de Mayo','Ciudad del Plata','Libertad'],
        'Soriano':['Mercedes','Dolores'],
        'Tacuarembo':['Tacuarembo','Paso de los Toros'],
        'Treinta y Tres':['Treinta y Trest']},
    
    loadDescription: function(cur,x){
        $.ajax({
            url:'/publicar/description',
            type:'post',
            data:{animal:Publicar.animal,tab:Publicar.tab},
            success:function(response){
                cur.next().html(response);
                Publicar.sliderHeight(cur,x);
            }
        });
    },
    cur_pos:0,
    
    
    slideRight: function(next_pos,forward_move){
        
        console.log('here');
        if(!forward_move && this.cur_pos < next_pos){
            return;
        }
        this.cur_pos=next_pos;
        
        var next_box = $($('.slides:eq('+(next_pos)+')'));
        
        //var next_box = cur_box.next();
        $('.slides').css('position','absolute');  
        $('.slides').css({left:'-1000px'});
        next_box.css({position:'relative',left:0});
        
        if(this.group=='producto'){
            $('.tienda').hide();
            $('.'+Publicar.animal).show();
        }
        
        $('.step').attr('class','step');
        $('.step:eq('+(next_pos)+')').addClass('highlight');
        $('.publicar_header_arrow').removeClass('highlight_pink');
        //$('.publicar_header_arrow:eq('+(next_pos-1)+')').addClass('highlight_pink');
        
        
        
        if(next_box.hasClass('description')){
            $.ajax({
                url:'/publicar/description',
                type:'post',
                data:{animal:Publicar.animal,tab:Publicar.tab},
                success:function(response){
                    next_box.html(response);
                }
            });
        }
        
        
        /*
        var cur = $(elem).closest('.slides');
        
        if(typeof Publicar.animal==='undefined'){
            return;
        }
        
        
        
        
        $('.step').attr('class','step');
        $('.step:eq('+(x/-1000)+')').addClass('highlight');
        $('.publicar_header_arrow').removeClass('highlight_pink');
        $('.publicar_header_arrow:eq('+(x/-1000-1)+')').addClass('highlight_pink');
        
        if(cur.next().hasClass('description')){
            this.loadDescription(cur,x);
        }else if(cur.next().hasClass('tab')){
            
            if(Publicar.animal=='pez'){
                $('.tab_option').hide();
                $('.tab_comprar').show();
            }
            if(Publicar.animal=='ave'){
                $('.tab_perdido').hide();
                $('.tab_encontrado').hide();
            }
            if(Publicar.animal=='reptil'){
                $('.tab_perdido').hide();
                $('.tab_encontrado').hide();
            }
            
            
            this.sliderHeight(cur,x);
        }else{
            
            this.sliderHeight(cur,x);
        }
        */
        
    },
    
    sliderHeight: function(cur,x){
        var cur_h = cur.height();
        var next_h = cur.next().height();
        $('.slides').css('position','absolute');  
        cur.next().css({position:'relative',height:cur_h-12});
        $('#publicar_slider').animate({left:x},function(){
            $('.publicar').animate({'height':next_h+40});
        });
    },
    
    
    
    addslashes: function(string) {
        return string.replace(/\\/g, '\\\\').
            replace(/\u0008/g, '\\b').
            replace(/\t/g, '\\t').
            replace(/\n/g, '\\n').
            replace(/\f/g, '\\f').
            replace(/\r/g, '\\r').
            replace(/'/g, '\\\'').
            replace(/"/g, '\\\\"');
    },
    
    
    submit: function(elem,test){
        
        $('.input_error').html('');
        var nicE = new nicEditors.findEditor('nicedit_text');
        var description = nicE.getContent();
        
        var form =$('#form_description');
        var submit_ok = true;
        
        form.append('<input type="hidden" name="tipo" value="'+Publicar.type+'"/>');
        form.append('<input type="hidden" name="tab" value="'+Publicar.tab+'"/>');
        if(Publicar.group=='producto'){
            form.append('<input type="hidden" name="animal" value="'+Publicar.animal+'"/>');
        }
        
        var form_var = form.serializeArray();
        var submit_var = {};
        for(var i in form_var){
            var key = form_var[i].name;
            var obj = {};
            submit_var[key]=form_var[i].value;
        }
        submit_var.descripcion=description;

        url = '/publicar/'+test+'/';
        $.ajax({
            url:url,
            type:'POST',
            data:submit_var,
            success:function(response){
                //console.log(response);
                window.location=response;
            }
        });
        
    },
    
    
    
    gotoMascota: function(){
        window.location = '/mascota/'+Publicar.lastinsert;
    }
}




var Carussel = {
    len:'',
    timeout:'',
    init: function(){
        $('.slidprev').on('click',function(){Carussel.slide(0)});
        $('.slidnext').on('click',function(){Carussel.slide(1)});
        this.len = $('#slider > div').length;
        this.width = $('.caroufredsel_wrapper').width();
        this.autoSlide();
    },
    slide: function(dir){
        clearTimeout(this.timeout);
        var cur = parseInt($('#slider').css('left').split('px')[0],10);
        if(dir){
            if(cur<=(this.len-1)*this.width*-1){
                $('#slider').animate({'left':0});
            }
            else{
                $('#slider').animate({'left':cur-Carussel.width});
            }
        }else{
            if(cur==0){
                $('#slider').animate({'left':(this.len-1)*this.width*-1});
            }
            else{
                $('#slider').animate({'left':cur+Carussel.width});
            }
        }
        this.autoSlide();
    },
    autoSlide: function(){
        this.timeout = setTimeout(function(){
            Carussel.slide(1);
        },7000);
    }
}


var Validation = {
    email: function(email) { 
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    } 
}


Filter = {
    submit: function(){
        $('form#filter').submit();
        //var tamano = $('input:radio[name=tamano]:checked').val();
        
    },
    unfilter: function(name){
        $('input[name='+name+']').each(function(){
            $(this).prop('checked', false);
            $(this).val('');
        });
        if(name=='departamento'){
            $("select").select2("val", '');
        }
        if(name=='animal_detail'){
            $("select").select2("val", '');
        }
        $('form#filter').submit();
    }
};




Register = {
    open: function(){
        $('.overlay').show();
        var w = $('body').width();
        var h = $('body').height();
        
        var register_h = $('#register').height();
        var to_h = (h-register_h)/2;
        
        if(h<register_h){
            to_h=0;
            $('#register').css({height:h});
        }
        
        $('#register').css({top:to_h,left:w/2,display:''});
        $('#register').show();
    }
};



Contactar = {
    show: function(contact_id){
        this.ajax(contact_id);
        $('.overlay').show();
    },
    ajax: function(contact_id){
        var self = this;
        $.ajax({
            url:'/account/contactar/?user_id='+contact_id,
            type:'GET',
            dataType:'JSON',
            success:function(response){
                self.fillInfo(response);
            }
        });
    },
    fillInfo: function(obj){
        $('#empty_box .overlay_box_inner').html('<p>Nombre: '+obj.firstname+' '+obj.lastname+'</p><p>Email: '+obj.email+'</p><p>Telefono: '+obj.telefono);
        $('#empty_box').css({display:'block',left:$('body').width()/2,top:300});
        return;
        $('#contactar').remove();
        var clone = $('#empty_box').clone();
        clone.attr('id','contactar');
        clone.find('.publicar').html('<p>Nombre: '+obj.firstname+' '+obj.lastname+'</p><p>Email: '+obj.email+'</p><p>Telefono: '+obj.telefono);
        clone.css({display:'block',left:$('body').width()/2,top:300});
        $('body').append(clone);
    }
}


UpdateUser = {
    selectField: function(elem,column){
        $('.overlay').show();
        var box = $('#empty_box');
        var w = $('body').width();
        var h = $('body').height();
        var register_h = box.height();
        var to_h = (h-register_h)/2;
        
        if(h<register_h){
            to_h=0;
            box.css({height:h});
        }
        box.css({top:to_h-100,left:w/2,display:''});
        box.show();
        var box_content = box.find('.overlay_box_inner');
        box_content.html($('.update_user').html());
        var name = $(elem).find('.item_user_align:first').html();
        box_content.find('span').html(name);
        box_content.find('input:first').val($(elem).find('.item_user_align:last').html());
        box_content.find('input:last').val(column);
        box_content.show();
//<p style="font-size:16px;padding-bottom:20px;">Modificar</p><span>'+$(elem).find('.item_user_align:first').html()+'</span>&nbsp;<input name="'+column+'" type="text" value="'+$(elem).find('.item_user_align:last').html()+'">&nbsp;<button class="button">Guardar</button>');
    }
}