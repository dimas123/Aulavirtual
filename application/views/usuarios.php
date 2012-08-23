<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" type="text/css" href="/aulavirtual/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/aulavirtual/css/ausuario.css">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/aulavirtual/css/fontello.css">
    <!--[if IE 7]>
      <link rel="stylesheet" href="/aulavirtual/css/fontello-ie7.css">
    <![endif]-->
</head>
<body>
<?php 
function paginas($nro_paginas, $pagina, $base = '')
{
        if($nro_paginas < 1) return '';
        if(!ctype_digit($pagina)) $pagina = 1;
        
        $op = '';
        
        if(($fin = ($pagina+1)+floor(8/2)) > $nro_paginas)
                $fin = $nro_paginas;                                
        
        if(($ini = ($pagina+1)-floor(12/2)) <= 1)
                $ini = 1;

    for($i = $ini; $i <= $fin; ++$i)
            $op.= ($pagina != $i ? anchor(sprintf($base,$i), $i) : $i) . ' ';
        
        return $op;
}
function short($txt,$size){
    
    $short = $size - 3;
    if(strlen($txt) > $size){
        $data = substr( $txt, 0, $short )."...";
    }
    else
    {
        $data = $txt;
    }

    return $data;
}

function fecha_latino($fecha)
{
    $fecha = substr($fecha, 0, -9);
    $fecha = explode('-',$fecha);
    $fecha = $fecha['2'].'/'.$fecha['1'].'/'.$fecha['0'];
    return $fecha;
}
?>
<div class="cabecera"></div>
<div id="contenedor">
<div class="trh">
    <div class="th td1">#</div>
    <div class="th td2">Usuario</div>
    <div class="th td3">Nombre</div>
    <div class="th td4">Acciones</div>
</div>
<?php 
foreach ($result as $usuario) {
?>
    <div class="tr">
        <div class="td td1"><?php echo $usuario['id']; ?></div>
        <div class="td td2"><?php echo short($usuario['usuario'],15); ?></div>
        <div class="td td3"><?php echo short($usuario['nombre'],15); ?></div>
        <div class="td acciones td4"><?php echo anchor('usuario/ver?id='.$usuario['id'],'<i class="icon-search"></i>').' | '.anchor('usuario/eliminar?id='.$usuario['id'],'<i class="icon-trash-empty"></i>'); ?></div>
    </div>
<?php } ?>
<br/><br/><br/>
<div class="paginado">
<?php echo paginas($pages, $pagina, 'usuario/lista/%s'); ?>
</div>
<div class="btnIngresar">
    <div class="btna">
    <?php echo anchor('usuario/form','ingresar').'<br/>';  ?>
    </div>
</div>

</div>
<div class="footer"></div>
</body>
</html>




<?php 

	echo '<pre>';
	print_r($result);
	echo '</pre>';

	echo $pagina;
?>