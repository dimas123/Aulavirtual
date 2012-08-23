<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Noticias</title>
	<link rel="stylesheet" type="text/css" href="/aulavirtual/css/admin.css">
	<link rel="stylesheet" type="text/css" href="/aulavirtual/css/ausuarioform.css">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/aulavirtual/css/fontello.css">
    <!--[if IE 7]>
      <link rel="stylesheet" href="/aulavirtual/css/fontello-ie7.css">
    <![endif]-->
</head>
<body>
<div class="cabecera"></div>
<div id="contenedor">
	<?php 
	$attributes = array('enctype' => 'multipart/form-data');
	echo form_open('usuario/editar',$attributes); 
	?>
	<div class="tr">
		<div class="td">Usuario : </div>
		<div class="td"><?php echo form_input('usuario', $resultado['usuario'],'placeholder="Usuario", size="75"'); ?></div>
	</div>
	<div class="tr">
		<div class="td">Contrase&ntilde;a : </div>
		<div class="td"><?php echo form_password('contrasena', '','placeholder="contrase&ntilde;a", size="75"'); ?></div>
	</div>
	<div class="tr">
		<div class="td">Nombre : </div>
		<div class="td"><?php echo form_input('nombre', $resultado['nombre'],'placeholder="Nombre", size="75"'); ?></div>
	</div>
	<div class="tr">
		<div class="td">Ciudad : </div>
		<div class="td"><?php echo form_input('ciudad', $resultado['ciudad'],'placeholder="Ciudad", size="75"'); ?></div>
	</div>
	<div class="tr">
		<div class="td">Distrito : </div>
		<div class="td"><?php echo form_input('distrito', $resultado['distrito'],'placeholder="Distrito", size="75"'); ?></div>
	</div>
	<div class="tr">
		<div class="td">Imagen : </div>
		<div class="td"><?php echo form_upload('imagen',$resultado['foto']); ?></div>
	</div>
	<div class="tr imagen">
		<div class="td tdx2"><img src="/aulavirtual/<?php echo $resultado['foto']; ?>" width="100" height="100"/></div>
	</div>
	<?php echo form_hidden('id', $this->input->get('id')); ?>
	<div class="tr">
		<?php echo form_submit('boton', 'Ingresar'); ?>
	</div>
	<div class="tr btnatras">
		<?php echo anchor('usuario', '<i class="icon-left"></i>'); ?>
	</div>
	<?php echo form_close(); ?>
</div>
<div class="footer"></div>
</body>
</html>
