<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo HTTP_CSS_PATH; ?>bootstrap.min.css" crossorigin="anonymous">


	<link rel="stylesheet" href="<?php echo HTTP_CSS_PATH; ?>datatables.min.css">
</head>
<body>

<div class="container">
	<h1>Administracionde Empleados</h1>
	<div class="container-button" style="margin-bottom: 10px">
		<button id="newmodl" class="btn btn-primary pull-right">Nuevo Empleado</button>
	</div>

	<div class="table-responsive-md">
		<table id="tb_empleado" class="table table-bordered table-striped table-hover">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Direccion</th>
				<th>Acciones</th>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	
</div>

<!-- Modal -->
<div class="modal fade" id="modal_empleado" tabindex="-1" role="dialog" aria-labelledby="modal_empleado_label" aria-hidden="true">
	<?php echo form_open("Welcome/insert_update", array("class"=>"form-online", "id"=>"frm_empleado", "name"=>"frm_empleado", "method"=>"POST")); ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_empleado_label">Agregar Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <?php echo form_input($campos['txtcodig']); ?>
        <?php echo form_input($campos['txtsection']); ?>
      </div>
      <div class="modal-body">

		<div class="form-group">
            <?php echo form_label('Nombre');
                  echo form_input($campos['txtnombre']);
            ?>
        </div>

        <div class="form-group">
            <?php echo form_label('Apellido');
                  echo form_input($campos['txtapellido']);
            ?>
        </div> 

        <div class="form-group">
            <?php echo form_label('Descripción');
                  echo form_input($campos['txtdescripcion']);
            ?>
        </div> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="text_submit" class="btn btn-primary"></button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<script src="<?php echo HTTP_JS_PATH; ?>jquery.js"></script>
<script src="<?php echo HTTP_JS_PATH; ?>bootstrap.min.js" crossorigin="anonymous"></script>
<script src="<?php echo HTTP_JS_PATH; ?>empleados.js"></script>
<script src="<?php echo HTTP_JS_PATH; ?>datatables.min.js"></script>

</body>
</html>