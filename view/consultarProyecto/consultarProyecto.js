var tabla;
var usu_id =  $('#user_idx').val();
var rol_id =  $('#rol_idx').val();

function init(){

    $("#proyecto_form").on("submit", function(e){
        guardar(e);
    });

}

    $(document).ready(function(){

        $.post("../../controller/usuario.php?op=combo", function (data){
            $('#usu_asig').html(data);
        });

        if (rol_id==1){
            tabla=$("#proyecto_data").dataTable({
                "aProcessing": true,
                "aServerSide": true,
                dom: 'Bfrtip',
                "searching": true,
                lengthChange: false,
                colReorder: true,
                buttons: [		          
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                        ],
                "ajax":{
                    url: "../../controller/proyecto.php?op=listar_por_usuario",
                    type : "post",
                    dataType : "json",	
                    data:{ usu_id : usu_id },						
                    error: function(e){
                        console.log(e.responseText);	
                    }
                },
                "bDestroy": true,
                "responsive": true,
                "bInfo":true,
                "iDisplayLength": 10,
                "autoWidth": false,
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }     
            }).DataTable();
        }else{
            tabla=$("#proyecto_data").dataTable({
                "aProcessing": true,
                "aServerSide": true,
                dom: 'Bfrtip',
                "searching": true,
                lengthChange: false,
                colReorder: true,
                buttons: [		          
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                        ],
                "ajax":{
                    url: "../../controller/proyecto.php?op=listar",
                    type : "post",
                    dataType : "json",						
                    error: function(e){
                        console.log(e.responseText);	
                    }
                },
                "bDestroy": true,
                "responsive": true,
                "bInfo":true,
                "iDisplayLength": 10,
                "autoWidth": false,
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }     
            }).DataTable();
        }
             
       

    });

    function ver(proyect_id) {
        // Construye la URL con el valor de proyect_id
        var url = "http://localhost/Interventoria/view/detalleProyecto/?ID=" + proyect_id;
        
        // Abre una nueva ventana o pestaña del navegador con la URL
        window.open(url);
    }

    function asignar(proyect_id) {
        $.post("../../controller/proyecto.php?op=mostrar", {proyect_id : proyect_id}, function (data){
            data = JSON.parse(data);
            $('#proyect_id').val(data.proyect_id);

            $('#mdltitulo').html('Asignar interventor');
            $("#modalasignar").modal('show');
        });
        
    }

    function guardar(e){
        e.preventDefault();
        var formData = new FormData($("#proyecto_form")[0]);
        $.ajax({
            url: "../../controller/proyecto.php?op=asignar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){    
                $("#modalasignar").modal('hide');
                $('#proyecto_data').DataTable().ajax.reload();

            }
        }); 
    }

init();