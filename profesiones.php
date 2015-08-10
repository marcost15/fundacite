<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_profesiones.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('cargos.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new dbFormHandler('profesiones',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'profesiones','mysql');
$f1->borderStart('Profesiones de Empleados');
$f1->textField('Nombre de la Profesion','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"profesiones.nombre.value=profesiones.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el nombre de la profesion');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="LA PROFESION SE REGISTRO CORRECTAMENTE";
	ir("profesiones.php");
}
 
$smarty->assign('f1',$f1->flush(true));
$smarty->assign('profesiones',bd_obt_profesiones());
$smarty->disp();
unset($_SESSION['mensaje']);