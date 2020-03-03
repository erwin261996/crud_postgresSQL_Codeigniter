
$(document).ready(function() {
  inicio();
});

var inicio = function() {
	informacion();

	$("#newmodl").on('click', function() {
		$('#frm_empleado')[0].reset();
		$("#modal_empleado_label").html('Agregar Empleado');
		$("#text_submit").html('Guardar cambios');
		$("#codsection").val(1);
		$('#modal_empleado').modal({
			show: true,
	        backdrop: 'static'
		});
	});

	$("#frm_empleado").submit(function (event){
        event.preventDefault();
        var formData = new FormData(document.getElementById("frm_empleado"));
        $.ajax({
            url:$("#frm_empleado").attr("action"),
            type:$("#frm_empleado").attr("method"),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(info){
                informacion();
                $('#modal_empleado').modal('hide');
            }
        });
    });

	
}

var informacion = function() {
	$.ajax({
        type: 'POST',
        data: '',
        dataType: 'json',
        url: 'welcome/lista',
        cache: false,
        success:function(info){
            info_table(info.data);
        }
    });
}

var info_table = (dataSet) => {
    let table = $("#tb_empleado").DataTable({
        "fnClearTable":true,
        "destroy":true,
        data: dataSet,
        "columns":[
            {"data":"id"},
            {"data":"nombre"},
            {"data":"apellido"},
            {"data":"direccion"},
            {"defaultContent": "<button title='Editar Registro' type='button' class='editar btn btn-primary' style='margin-right:10px;'>Editar </button>"+
        						"<button title='Editar Registro' type='button' class='eliminar btn btn-danger' style='margin-right:10px;'>Eliminar </button>"}
        ],

        "bPaginate": true,
        "bFilter": true,
        "bInfo": false, 
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
             	"targets": [0],
                "visible": false,
                "searchable": false 
          	},
        ]
    });
    update_info("#tb_empleado tbody", table);
}

var update_info = function (tbody, table) {
	$(tbody).on("click", "button.editar", function(){

        var $tr = $(this).closest('tr');
        var data = $('#tb_empleado').DataTable().row($tr).data();
    	
    	$("#codsection").val(2);
    	$("#cod").val(data.id);
    	$("#strnombre").val(data.nombre);
    	$("#strapellido").val(data.apellido);
    	$("#strdescripcion").val(data.direccion);
       
        $("#modal_empleado_label").html('Actualizar Empleado');
        $("#text_submit").html('Actualizar cambios');
        $('#modal_empleado').modal({
            show: true,
            backdrop: 'static'
        });
    });

    // Accion del boton 2 :: Borrar contenido
    $(tbody).on("click", "button.eliminar", function(){
        var $tr = $(this).closest('tr');
        var data = $('#tb_empleado').DataTable().row($tr).data();

        $.ajax({
	        type: 'POST',
	        data: {'cod': data.id},
	        dataType: 'json',
	        url: 'welcome/delete',
	        cache: false,
	        success:function(info){
	            informacion();
	        }
	    });
    });
}