<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_lista_niveles.php';
include './modelo/bd_cambiar_privilegios.php';
include './modelo/bd_obt_privilegios.php';
include './modelo/bd_obt_niveles.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('privilegios.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}


if(isset($_REQUEST['accion']))
{
	if($_SESSION['usuario']['nivel_id'] == '1')
	{
		switch($_REQUEST['accion'])
		{
			case 'eliminar':
			enviar_sql("DELETE FROM privilegios WHERE pagina = '$_REQUEST[id]';");
			ir('privilegios.php');
			break;
		}
	}
	else
	{
		$_SESSION['mensaje']="NO TIENE PERMISOS SUFICIENTES PARA ELIMINAR";
		ir('privilegios.php');
	}
}

function procesar($d)
{
	bd_cambiar_privilegios($d);
	ir('privilegios.php');
}
$entrada2=array();
$entrada=array();
$niveles=bd_obt_niveles();
$nniveles=count($niveles);

$tabla=bd_obt_privilegios();
$paginas=array();

foreach($tabla as $p)
{
	$paginas[ $p['pagina'] ] [ $p['nivel_id'] ] = $p['acceso'];
	
}
$tabla=$paginas;
$paginas=array();
foreach($tabla as $p=>$priv)
{
	for($i=1;$i<=$nniveles;$i++)
	{
		$privo[$i-1]=($priv[$i]=='CONCEDER')?'CONCEDER':'DENEGAR';	
	}
	
	$paginas[]=array('pagina'=>$p,'priv'=>$privo);
}


$archivos=array();
$d = dir(".");
while (false !== ($entrada = $d->read())) {
  $entrada2=explode('.',$entrada);
	if($entrada2[1]=='php')
	{
		$archivo=join('.',$entrada2);
		$archivos[$archivo]=$archivo;
	}
}
$d->close();
asort($archivos); 

$acceso=array(
'CONCEDER' => 'Conceder el acceso',
'DENEGAR'  => 'Denegar el acceso'
);

$f1=new formHandler('privilegios',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->addHTML(" <br />"."<div id='titulo'>PRIVILEGIOS</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->ListField("Pagina", "pagina", $archivos,'',true,'SELECCIONADOS','DISPONIBLE',5);
$f1->radioButton('Nivel','nivel_id',bd_lista_niveles(),FH_NOT_EMPTY,true);
$f1->selectField('Privilegios','acceso',$acceso,FH_NOT_EMPTY,true);
$f1->setHelpText('pagina','Por Favor seleccione la Pagina, el nivel de acceso y el Privilegio');
$f1->submitButton('Aplicar el cambio','aplicar');
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->onCorrect('procesar');

$ids = sql2array("SELECT DISTINCT pagina FROM privilegios WHERE acceso LIKE 'CONCEDER' ORDER BY pagina ASC, nivel_id ASC");

$smarty->assign('nniveles',$nniveles);
$smarty->assign('niveles',$niveles);
$smarty->assign('tabla',$paginas);
$smarty->assign('ids',$ids);
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();