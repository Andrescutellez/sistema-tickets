function init(){

}

$(document).ready(function(){
    var proyect_id = getUrlParameter('ID');

    listarDetalle(proyect_id);

    $.post("../../controller/proyecto.php?op=listarDetalle", {proyect_id : proyect_id}, function (data){
        $('#lbldetalle').html(data);
    });

});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

    $(document).on("click", "#btnenviar", function(){
        var proyect_id = getUrlParameter('ID');
        var usu_id = $("#user_idx").val();
        var proyectd_desc = $("#proyectd_desc").val();

        if ($("#proyectd_desc").val()==''){
            swal("Advertencia!", "Falta comentario", "warning");
        }else{

            // Realiza la petición POST
        $.post("../../controller/proyecto.php?op=insert_detalle", {proyect_id:proyect_id, usu_id:usu_id, proyectd_desc:proyectd_desc}, function(data) {
            listarDetalle(proyect_id)
            swal("Correcto", "Comentario guardado", "success");
            
            // Limpia el campo proyectd_desc
            $("#proyectd_desc").val("");
        });
            
        }
        
    
    });

    $(document).on("click", "#btncerrar", function(){
        swal({
            title: "Seguro de terminar proyecto?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Si!",
            cancelButtonText: "No!",
            closeOnConfirm: false,

        },
        function(isConfirm) {
            if (isConfirm) {
                var proyect_id = getUrlParameter('ID');
                var usu_id = $("#user_idx").val();
                $.post("../../controller/proyecto.php?op=update", { proyect_id: proyect_id, usu_id: usu_id }, function (data) {

                });

                listarDetalle(proyect_id);

                swal({
                    title: "Proyecto",
                    text: "Terminado correctamente.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            } 
        });

    });

function listarDetalle(proyect_id){
    $.post("../../controller/proyecto.php?op=listarDetalle", {proyect_id : proyect_id}, function (data){
        $('#lbldetalle').html(data);
    });

    $.post("../../controller/proyecto.php?op=mostrar", { proyect_id: proyect_id }, function (data) {
        data = JSON.parse(data);
        $('#lblnomusuario').html(data.usu_nom + ' ' + data.usu_ape);
        console.log("Valor de data.proyect_estado: " + data.proyect_estado);
        if (data.proyect_estado === "Abierto") {
            $("#lblestado").append('<span class="label label-pill label-success">Abierto</span>');
        } else {
            $("#lblestado").append('<span class="label label-pill label-danger">Cerrado</span>');
        }
        
        $('#lblfechcrea').html(data.fech_crea);
        $('#lblnomidproyecto').html("Detalle Proyecto - " + data.proyect_id);
        $('#proyecto_titulo').val(data.titulo_id);
        $('#proyecto_sucursal').val(data.sucursal);
        $('#proyecto_descripcion').val(data.proyect_desc);

        if(data.proyect_estado =="Cerrado"){
        $('#panelcomentar').hide();
        }
    });

}
    
init();