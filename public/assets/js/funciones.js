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

    showSubMenu();
});

function showSubMenu() {

    if( $("#show").length ) {
        $("#show").click(function () {
            if ($('#dropdown').is(":visible")) {
                $('#dropdown').hide("slow");
            } else {
                $('#dropdown').show("slow");
            }
        });
    }
}




$('#Map1').hover(function() {
    $('#image_jitomates').attr('src', 'assets/images/jitomatesover.png');
    }, function() {
    $('#image_jitomates').attr('src', 'assets/images/jitomates.png');
    }
);

$('#Map2').hover(function() {
    $('#image_cerdo').attr('src', 'assets/images/boton_puercoover.png');
    }, function() {
    $('#image_cerdo').attr('src', 'assets/images/boton_puerco.png');
    }
);

$('#Map3').hover(function() {
    $('#image_agua').attr('src', 'assets/images/agua_over.png');
    }, function() {
    $('#image_agua').attr('src', 'assets/images/btn_agua.png');
    }
);

$('#Map4').hover(function() {
    $('#image_elote').attr('src', 'assets/images/botonelotes_over.png');
    }, function() {
    $('#image_elote').attr('src', 'assets/images/boton_elotes.png');
    }
);

$('#Map5').hover(function() {
    $('#image_maquina').attr('src', 'assets/images/boton-quienes-somos_over.png');
    }, function() {
    $('#image_maquina').attr('src', 'assets/images/boton_quienessomos.png');
    }
);
