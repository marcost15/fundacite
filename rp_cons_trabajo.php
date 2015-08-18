<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_personal.php';
include './modelo/bd_obt_niveles.php';
include './modelo/bd_obt_cargos.php';
include './modelo/bd_obt_profesiones.php';
include './modelo/bd_obt_grado_instruccion.php';
include './modelo/bd_obt_clasificacion.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('rp_cons_trabajo.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$personal = bd_ficha_personal($_SESSION['usuario']['id']);
$personal['cargo_id'] = bd_obt_cargos($personal['cargo_id']);
$personal['profesion_id'] = bd_obt_profesiones($personal['profesion_id']);
$personal['grado_instruccion_id'] = bd_obt_grado_instruccion($personal['grado_instruccion_id']);
$personal['fecha_ing'] = f2f("$personal[fecha_ing]");
$personal['clasificacion_id'] = bd_obt_clasificacion($personal['clasificacion_id']);

$fecha = date('Y-m-d');
$fecha = fecha_larga($fecha);
$smarty->assign('datos',$personal);
$smarty->assign('fecha',$fecha);
$smarty->disp();