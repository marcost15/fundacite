<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_departamentos.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('departamentos.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new dbFormHandler('departamentos',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'departamentos','mysql');
$f1->borderStart('Departamentos');
$f1->textField('Nombre','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"departamentos.nombre.value=departamentos.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el nombre del departamento');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="EL DEPARTAMENTO SE REGISTRO CORRECTAMENTE";
	ir("departamentos.php");
}
 
$smarty->assign('f1',$f1->flush(true));
$smarty->assign('departamentos',bd_obt_departamentos());
$smarty->disp();
unset($_SESSION['mensaje']);