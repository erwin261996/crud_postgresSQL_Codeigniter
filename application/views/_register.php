<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo HTTP_CSS_PATH; ?>bootstrap.min.css" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		
		<?php echo form_open("Register/registro", array("class"=>"form-online", "id"=>"frm_login", "name"=>"frm_login", "method"=>"POST")); ?>
		  <div class="form-group">
		  	<?php echo form_label('Email');
                  echo form_input($campos['txtusuario']);
            ?>
		  </div>
		  <div class="form-group">
		  	<?php echo form_label('Password');
                  echo form_input($campos['txtpass']);
            ?>
		  </div>
		  <button type="submit" class="btn btn-primary">Registrate</button>
		  <a href="<?php echo base_url().'/Login'; ?>">Volver</a>
		<?php echo form_close(); ?>

	</div>

	<script src="<?php echo HTTP_JS_PATH; ?>jquery.js"></script>
	<script src="<?php echo HTTP_JS_PATH; ?>bootstrap.min.js" crossorigin="anonymous"></script>
	
</body>
</html>