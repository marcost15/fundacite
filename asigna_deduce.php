<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_asigna_deduce.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('asigna_deduce.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$tipo = array(
"A" => "ASIGNACION",
"D" => "DEDUCCION"
);

$sino = array(
"N" => "NO",
"S" => "SI"
);

$tipo_calc = array(
"M" => "MONTO FIJO",
"P" => "PORCENTAJE",
"F" => "FORMULA"
);

$f1=new dbFormHandler('asigna_deduce',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'asig_deducciones','mysql');
$f1->borderStart('Asignaciones y Deducciones de Empleados');
$f1->textField('Nombre','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"asigna_deduce.nombre.value=asigna_deduce.nombre.value.toUpperCase();\"");
$f1->selectField("Tipo", "tipo",$tipo,FH_NOT_EMPTY,true);
$f1->selectField("Tipo de Calculo", "tipo_calc",$tipo_calc,FH_NOT_EMPTY,true);
$f1->textField('Porcentaje','porc',_FH_DIGIT,10,10, "onkeyup=\"return ValNumero(this);\"");
$f1->textField('Monto','monto',_FH_DIGIT,10,10, "onkeyup=\"return ValNumero(this);\"");
$f1->textField('Formula','formula',_FH_STRING,40,255,"onkeyup=\"asigna_deduce.formula.value=asigna_deduce.formula.value.toUpperCase();\"");
$f1->selectField("SSO", "sso",$sino,FH_NOT_EMPTY,true);
$f1->selectField("LPH", "lph",$sino,FH_NOT_EMPTY,true);
$f1->selectField("LPF", "lpf",$sino,FH_NOT_EMPTY,true);
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje($d)
{
	$_SESSION['mensaje']="LA ASIGNACION O DEDUCCION SE REGISTRO CORRECTAMENTE";
	ir("asigna_deduce.php");
}
 
$smarty->assign('f1',$f1->flush(true));
$smarty->assign('asigna_deduce',bd_obt_asigna_deduce());
$smarty->disp();
unset($_SESSION['mensaje']);