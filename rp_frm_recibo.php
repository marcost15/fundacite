<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('rp_frm_recibo.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$quincena = array(
"1ERA" => "1ERA",
"2DA" => "2DA",
);

$f1=new dbFormHandler('pagos',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Generar Recibo');
$f1->selectField("Quincena", "quincena",$quincena,FH_NOT_EMPTY,true);
$f1->DateField('Mes y Año','mes_ano',FH_NOT_EMPTY,1,'m-y',"03:03");
$f1->submitButton('Aceptar','Aceptar');
$f1->borderStop();
$f1->onCorrect("procesar");

function procesar($d)
{
	$mes_ano = $d['mes_ano'];
	$quincena = $d['quincena'];
	ir("rp_cons_recibo.php?mes_ano=$mes_ano&quincena=$quincena");
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);
