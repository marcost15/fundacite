<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_grado_instruccion.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('grado_instruccion.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new dbFormHandler('grado_instr',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'grado_instruccion','mysql');
$f1->borderStart('Grados de Instruccion de Empleados');
$f1->textField('Grado de Instrucción','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"grado_instr.nombre.value=grado_instr.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el Grado de Instruccion');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="EL GRADO SE REGISTRO CORRECTAMENTE";
	ir("grado_instruccion.php");
}
 
$smarty->assign('f1',$f1->flush(true));
$smarty->assign('grado_instruccion',bd_obt_grado_instruccion());
$smarty->disp();
unset($_SESSION['mensaje']);