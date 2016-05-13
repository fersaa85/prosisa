$(document).ready(function(){

    $("#botonHamburguesa").on( "click", function() {
        //$('#galeriaClientes').hide(); //oculto mediante id
        //$('.target').hide(); //muestro mediante clase
        if($('#menuResponsive').is(":visible") ){
            $('#menuResponsive').hide("slow");
        }else{
            $('#menuResponsive').show("slow");
        }
    });

});

$('#Map1').hover(function() {
    $('#image_jitomates').attr('src', 'images/jitomatesover.png');
    }, function() {
    $('#image_jitomates').attr('src', 'images/jitomates.png');
    }
);

$('#Map2').hover(function() {
    $('#image_cerdo').attr('src', 'images/boton_puercoover.png');
    }, function() {
    $('#image_cerdo').attr('src', 'images/boton_puerco.png');
    }
);

$('#Map3').hover(function() {
    $('#image_agua').attr('src', 'images/agua_over.png');
    }, function() {
    $('#image_agua').attr('src', 'images/btn_agua.png');
    }
);

$('#Map4').hover(function() {
    $('#image_elote').attr('src', 'images/botonelotes_over.png');
    }, function() {
    $('#image_elote').attr('src', 'images/boton_elotes.png');
    }
);

$('#Map5').hover(function() {
    $('#image_maquina').attr('src', 'images/boton-quienes-somos_over.png');
    }, function() {
    $('#image_maquina').attr('src', 'images/boton_quienessomos.png');
    }
);
