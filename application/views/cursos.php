<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Listado de Cursos</title>
    <link rel="stylesheet" type="text/css" href="/aulavirtual/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/aulavirtual/css/acurso.css">
    <link rel="stylesheet" href="/aulavirtual/css/fontello.css">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
<div class="cabecera">
<ul id="ulmenu">
    <li><?php echo anchor('home','Inicio'); ?></li>
    <li><?php echo anchor('usuario','Usuarios'); ?></li>
    <li><?php echo anchor('curso','Cursos'); ?></li>
    <li><?php echo anchor('modulo','Módulos'); ?></li>
</ul>
</div>
<div id="contenedor">
<div class="trh">
    <div class="th td1">#</div>
    <div class="th td2">Curso</div>
    <div class="th td4">Acciones</div>
</div>
<?php 
foreach ($result as $curso) {
?>
    <div class="tr">
        <div class="td td1"><?php echo $curso['id']; ?></div>
        <div class="td td2"><?php echo $curso['nombre']; ?></div>
        <div class="td acciones td4"><?php echo anchor('curso/ver?id='.$curso['id'],'<i class="icon-search"></i>').' | '.anchor('curso/eliminar?id='.$curso['id'],'<i class="icon-trash-empty"></i>'); ?></div>
    </div>
<?php } ?>
<br/><br/><br/>
<div class="paginado">
<?php echo paginas($pages, $pagina, 'curso/lista/%s'); ?>
</div>
<div class="btnIngresar">
    <div class="btna">
    <?php echo anchor('curso/form','ingresar').'<br/>';  ?>
    </div>
</div>

</div>
<div class="footer"></div>
</body>
</html>