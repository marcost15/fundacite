<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_personal.php';
include './modelo/bd_obt_grado_instruccion.php';
include './modelo/bd_obt_clasificacion.php';
include './modelo/bd_obt_departamentos.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('rp_cons_recibo.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$mes_ano = $_REQUEST['mes_ano'];
$quincena = $_REQUEST['quincena'];

$mes_ano1=explode('-',$mes_ano);
$year=$mes_ano1[1];
$month=$mes_ano1[0];

if ("$quincena" == "1ERA")
{
	$fecha_desde = "01-"."$mes_ano";
	$fecha_hasta = "15-"."$mes_ano";
}
else
{
	$fecha_desde = "16-"."$mes_ano";
	$ultimo_dia = getUltimoDiaMes($year,$month);
	$fecha_hasta =  "$ultimo_dia"."-"."$mes_ano";
}

$fecha_desde = f2f($fecha_desde);
$fecha_hasta = f2f($fecha_hasta);
$personal_id = $_SESSION['usuario']['id'];
$personal = bd_ficha_personal($personal_id);

$personal['grado_instruccion_id'] = bd_obt_grado_instruccion($personal['grado_instruccion_id']);
$personal['clasificacion_id'] = bd_obt_clasificacion($personal['clasificacion_id']);
$personal['departamento_id'] = bd_obt_departamentos($personal['departamento_id']);

$pagos = sql2row("SELECT id,personal_id,clasificacion_id,quincena,fecha_desde,fecha_hasta,salario,total_asig,total_deducciones,neto 
				  FROM pagos WHERE fecha_desde = '$fecha_desde' AND fecha_hasta = '$fecha_hasta' AND quincena = '$quincena' AND personal_id = '$personal_id'");
$pago_id = $pagos['id'];
$pagos['fecha_desde'] = f2f($pagos['fecha_desde']);
$pagos['fecha_hasta'] = f2f($pagos['fecha_hasta']);
$pagos_asig_ded = sql2array("SELECT id,pago_id,asig_nombre,tipo,monto FROM pagos_asig_ded WHERE pago_id = '$pago_id' ORDER BY tipo");
$fecha = date('Y-m-d');
$fecha = fecha_larga($fecha);
$pagos['quincena'] = str_replace('.',',',"$pagos[quincena]");
$pagos['salario'] = str_replace('.',',',"$pagos[salario]");
$pagos['total_asig'] = str_replace('.',',',"$pagos[total_asig]");
$pagos['total_deducciones'] = str_replace('.',',',"$pagos[total_deducciones]");
$pagos['neto'] = str_replace('.',',',"$pagos[neto]");

foreach ($pagos_asig_ded as $y=>$t)
{
	$monto = $pagos_asig_ded[$y]['monto'];
	$pagos_asig_ded[$y]['monto'] = str_replace('.',',',"$monto");
}
				
$smarty->assign('datos',$personal);
$smarty->assign('fecha',$fecha);
$smarty->assign('pagos',$pagos);
$smarty->assign('pagos_asig_ded',$pagos_asig_ded);
$smarty->disp();