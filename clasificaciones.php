<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_clasificacion.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('clasificacion.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new dbFormHandler('clasificacion',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'clasificaciones','mysql');
$f1->borderStart('Clasificacion de Empleados');
$f1->textField('Nombre de la clasificación','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"clasificacion.nombre.value=clasificacion.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el nombre de la clasificación');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="LA CLASIFICACION SE REGISTRO CORRECTAMENTE";
	ir("clasificaciones.php");
}
 
$smarty->assign('f1',$f1->flush(true));
$smarty->assign('clasificacion',bd_obt_clasificacion());
$smarty->disp();
unset($_SESSION['mensaje']);