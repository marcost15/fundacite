<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_cargos.php';
include './modelo/bd_verificar_privilegios.php';

/*if (bd_verificar_privilegios('cargos.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}*/

$f1=new dbFormHandler('cargos',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'cargos','mysql');
$f1->borderStart('Cargos de Empleados');
$f1->textField('Nombre del Cargo','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"cargos.nombre.value=cargos.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el nombre del cargo');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="EL CARGO SE REGISTRO CORRECTAMENTE";
	ir("cargos.php");
}
 
$smarty->assign('f1',$f1->flush(true));
$smarty->assign('cargos',bd_obt_cargos());
$smarty->disp();
unset($_SESSION['mensaje']);