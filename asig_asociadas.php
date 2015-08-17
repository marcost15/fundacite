<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_clasificacion.php';
include './modelo/bd_lista_asigna_deduce.php';
include './modelo/bd_obt_asigna_deduce.php';
include './modelo/bd_guardar_asignacion_deduccion.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('asig_asociadas.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$id = $_REQUEST['id'];

if(isset($_REQUEST['asig_id']))
{
	switch($_REQUEST['func'])
	{
		case 'delete':
		$id_clasificacion = $_REQUEST['id'];
		enviar_sql("DELETE FROM clasificacion_asig_deduccion WHERE id = '$_REQUEST[asig_id]' LIMIT 1;");
		$_SESSION['mensaje']="ASIGNACIONES Y DEDUCCIONES ASOCIADAS ELIMINADA CORRECTAMENTE";
		ir("asig_asociadas.php?id=$id_clasificacion");
		break;
	}
}
	
$f2=new formHandler('asig_deducciones',NULL,'onclick="highlight(event)"');
$f2->setLanguage('es');
$f2->borderStart('Asignaciones y Deducciones Asociadas a la Clasificacion');
$f2->ListField("", "asig_ded_id", bd_lista_asigna_deduce(),'',true,'SELECCIONADOS','DISPONIBLE',5);
$f2->hiddenField('clasificacion_id', $id);
$f2->submitButton('Continuar','continuar');
$f2->borderStop();
$f2->onCorrect('procesar');

function procesar($d)
{
	bd_guardar_asignacion_deduccion($d);
	$_SESSION['mensaje']="ASIGNACIONES Y DEDUCCIONES ASOCIADAS REGISTRADA CORRECTAMENTE";
	$cla_id20 = $d['clasificacion_id'];
	ir("asig_asociadas.php?id=$cla_id20");
}

$clasificacion = sql2row("SELECT id, nombre, grado, complemento FROM clasificaciones where id = '$id'");

$clas_asociada = sql2array("SELECT id, asig_ded_id FROM clasificacion_asig_deduccion where clasificacion_id = '$id'");
if (!empty($clas_asociada))
{
	foreach ($clas_asociada as $i=>$c)
	{
		$asig_id = $clas_asociada[$i]['asig_ded_id'];
		$clas_asociada[$i]['nombre'] = bd_obt_asigna_deduce($asig_id);
		$clas_asociada[$i]['tipo'] = sql2value("SELECT tipo FROM asig_deducciones WHERE id = '$asig_id'");
		$clas_asociada[$i]['tipo_calc'] = sql2value("SELECT tipo_calc FROM asig_deducciones WHERE id = '$asig_id'");
	}
}

$smarty->assign('f2',$f2->flush(true));
$smarty->assign('clasificacion',$clasificacion);
$smarty->assign('datos',$clas_asociada);
$smarty->disp();
unset($_SESSION['mensaje']);