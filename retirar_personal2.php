<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_verificar_privilegios.php';
include './modelo/bd_retirar_personal.php';
if (bd_verificar_privilegios('retirar_personal2.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

bd_retirar_personal($_REQUEST['id']);
ir('consmod_personal.php');