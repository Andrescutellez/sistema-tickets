function init(){
    $("#proyecto_form").on("submit",function(e){
        guardaryeditar(e);
    });
}



function guardaryeditar(e) {
    e.preventDefault();
    var formData = new FormData($("#proyecto_form")[0]);
    if ($('#titulo_id').val()=='' || $('#cliente').val()=='' || $('#sucursal').val()=='' || $('#proyect_desc').val()==''){
        swal("Advertencia!", "Campos Vacios", "warning");
    }else{
        $.ajax({
            url: "../../controller/proyecto.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                console.log(datos);
                $("#titulo_id").val("");
                $("#cliente").val("");
                $("#sucursal").val("");
                $("#proyect_desc").val("");
                swal("Correcto", "Proyecto registrado", "success");
            }
    
                
        });
    }


    
}


init();

