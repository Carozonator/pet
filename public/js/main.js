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
            placeholder: "Eligue Raza",
            allowClear: false
        });
        $('select').on('change',function(){Filter.submit()});
    }
}
$(document).ready(function(){Ready.init();});








var Publicar = {
    departamento:{'Artigas':['Artigas','Bella Union'],
        'Canelones':['Ciudad de la Costa','Las Piedras','Barros Blancos','Pando','La Paz','Canelones','Santa Lucia','Progreso'],
        'Cerro Largo':['Melo','Rio Branco'],
        'Colonia':['Carmelo','Colonia del Sacramento','Juan Lacaze','Nueva Helvecia','Rosario'],
        'Durazno':['Durazno'],
        'Flores':['Trinidad'],
        'Florida':['Florida'],
        'Lavalleja':['Minas'],
        'Maldonado':['Maldonado','San Carlos','Punta Del Este'],
        'Montevideo':['Aguada','Barrio Sur','Buceo','Carrasco','Centro','Cerro','Cordon','Parque Rodo','Pocitos','Prado','Punta Carretas','Punta Gorda'],
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
    
    slideRight: function(elem,x){
        var cur = $(elem).closest('.slides');
        if(cur.next().hasClass('description')){
            this.loadDescription(cur,x);
        }else if(cur.next().hasClass('tab')){
            if(Publicar.animal=='pez'){
                $('.tab_option').hide();
                $('.tab_comprar').show();
            }
            if(Publicar.animal=='ave'){
                $('.tab_perdido').hide();
            }
            this.sliderHeight(cur,x);
        }else{
            this.sliderHeight(cur,x);
        }
        
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
    
    submit: function(elem){
        $('.input_error').html('');
        var nicE = new nicEditors.findEditor('nicedit_text');
        var description = nicE.getContent();
        var form =$(elem).closest('form');
        var submit_ok = true;
        form.append('<input type="hidden" name="descripcion" value="'+description+'"/>');
        form.append('<input type="hidden" name="tipo" value="'+Publicar.type+'"/>');
        /*
        if(Publicar.type=='mascota'){
            form.find('input').each(function(){
                if($(this).val()==''){
                    submit_ok=false;
                    if($(this).next().is('span')){
                        $(this).next().html('* dato obligatorio');
                    }
                }
            });
            if(description=='<br>'){
                submit_ok=false;
                $('#nicedit_text').next().html('* dato obligatorio');
            }
        }*/
        console.log("----hola----");
        if(submit_ok){
            form.submit();
        }
        return;
        console.log("----hola----");
        var url ='/publicar/anuncios/';
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data){
                alert(data); // show response from the php script.
            }
         });
    },
    
    tiendaTwo: function(elem){
        Publicar.slideRight(elem,'-2000');
    },
    
    tiendaOne: function(elem,type){
        //$('.tienda').hide();
        $('.'+type).show();
        Publicar.type=type;
        Publicar.slideRight(elem,'-1000');
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
        },5000);
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
        var clone = $('.overlay_box').clone();
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