/*libreria de funciones*/
$(document).ready(function(){
    //funcion para comprobacion de ruts
    //para utilizar agregar clase rut
    $(".rut").change(function () { 
        valor = this.value;
        valor = valor.replace('.','');
        valor = valor.replace('','');
        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        this.value = cuerpo+'-'+dv;
        if(cuerpo.length < 7 ){
            $("#lblrut").empty();
            $(this).after("<label id='lblrut' style='color:#ff0000; font-weight:bold'>Rut incompleto</label>");
            $(this).val('');
            return false;
        }else{
            $("#lblrut").hide();
        }
        suma = 0;
        multiplo = 2;

        for(i=1; i<=cuerpo.length; i++){
            var index = multiplo * valor.charAt(cuerpo.length - i);
            suma = suma + index;
            if(multiplo<7){multiplo = multiplo+1;}else{multiplo = 2;}
        }
        var dvEsperado = 11 - (suma %11);
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;

    if(dvEsperado != dv) 
    { $("#lblrut").empty();
    $(this).after("<label id='lblrut' style='color:#ff0000; font-weight:bold'>Rut no válido</label>");
    $(this).val(''); return false; }
    $("#lblrut").empty();
    
    });

    //clase para agregar solo numeros dentro de un campo de texto
    $('.numeros').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    //clase para solo letras
    $('.letras').on('input', function () { 
        this.value = this.value.replace(/[^A-Za-z]/g,'');
    });
});
