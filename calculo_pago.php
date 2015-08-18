<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_obt_asigna_deduce.php';
include './modelo/bd_verificar_privilegios.php';
if (bd_verificar_privilegios('calculo_pago.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$mes_ano = $_REQUEST['mes_ano'];
$quincena = $_REQUEST['quincena'];

$mes_ano1=explode('-',$mes_ano);
$year=$mes_ano1[1];
$month=$mes_ano1[0];
$day=1;
$dias_lunes = calculo_dia_especifico($year,$month,$day);

if ("$quincena" == "1ERA")
{
	$fecha_desde = "01-"."$mes_ano";
	$fecha_hasta = "15-"."$mes_ano";
}
else
{
	$fecha_desde = "16-"."$mes_ano";
	$ultimo_dia = getUltimoDiaMes($year,$month);
	$fecha_hasta =  "$ultimo_dia"."-"."$mes_ano";
}

function calculo($formula){
    eval("\$resp = $formula;");
    return $resp;
}
$fecha_desde = f2f($fecha_desde);
$fecha_hasta = f2f($fecha_hasta);

$pagos_rev = sql2array("SELECT id FROM pagos WHERE fecha_desde = '$fecha_desde' AND fecha_hasta = '$fecha_hasta' AND quincena = '$quincena'");
	if (!empty($pagos_rev))
	{
		foreach ($pagos_rev as $x=>$z)
		{
			$borrar = $pagos_rev[$x]['id'];
			enviar_sql("DELETE FROM pagos WHERE id = '$borrar'");
			enviar_sql("DELETE FROM pagos_asig_ded WHERE pago_id = '$borrar'");
		}
	}
	
$personal = sql2array("SELECT id, salario, clasificacion_id FROM personal, personal_datos WHERE personal_id = id");
foreach ($personal as $i=>$c)
{
	$personal_id = $personal[$i]['id'];
	$clasi = $personal[$i]['clasificacion_id'];
	$minimo = $personal[$i]['salario'];
	$complemento = sql2value("SELECT complemento FROM clasificaciones WHERE id = '$clasi'");
	$asig_deducciones_clasi = sql2array("SELECT asig_ded_id FROM clasificacion_asig_deduccion WHERE clasificacion_id = '$clasi'");
	$personal[$i]['monto_sso'] = 0;
	$personal[$i]['monto_lph'] = 0;
	$personal[$i]['monto_lpf'] = 0;
	$con_ind_a = 0;
	$con_ind_d = 0;
	foreach ($asig_deducciones_clasi as $m=>$z)
	{
		$asig_deduce_id = $asig_deducciones_clasi[$m]['asig_ded_id'];
		$asid_deducciones[$m] = sql2row("SELECT id,nombre,tipo,tipo_calc,porc,monto,formula,sso,lph,lpf FROM asig_deducciones WHERE id = '$asig_deduce_id'");
		$personal[$i]['asid_deduc'][$m] = $asid_deducciones[$m];
		$tipo = $asid_deducciones[$m]['tipo'];
		if ("$tipo" == "A")
		{
			$con_ind_a = $con_ind_a + 1;
			$personal[$i]['asignaciones'][$con_ind_a]['nombre'] = $asid_deducciones[$m]['nombre'];
			$personal[$i]['asignaciones'][$con_ind_a]['tipo'] = $tipo;
			$tipo_calc = $asid_deducciones[$m]['tipo_calc'];
			if ("$tipo_calc" == "M")
			{
				$personal[$i]['asignaciones'][$con_ind_a]['monto'] = $asid_deducciones[$m]['monto'];
			}
			else
			{
				if ("$tipo_calc" == "P")
				{
					$personal[$i]['asignaciones'][$con_ind_a]['monto'] = $minimo * $asid_deducciones[$m]['porc'] / 100;
				}
				else
				{
					$personal[$i]['asignaciones'][$con_ind_a]['monto'] = $minimo.$asid_deducciones[$m]['formula'];
				}
			}
			if ($personal[$i]['asid_deduc'][$m]['sso'] == "S")
			{
				$personal[$i]['monto_sso'] = $personal[$i]['monto_sso'] + $personal[$i]['asignaciones'][$con_ind_a]['monto'];
			}
			if ($personal[$i]['asid_deduc'][$m]['lph'] == "S")
			{
				$personal[$i]['monto_lph'] = $personal[$i]['monto_lph'] + $personal[$i]['asignaciones'][$con_ind_a]['monto'];
			}
			if ($personal[$i]['asid_deduc'][$m]['lpf'] == "S")
			{
				$personal[$i]['monto_lpf'] = $personal[$i]['monto_lpf'] + $personal[$i]['asignaciones'][$con_ind_a]['monto'];
			}
			$personal[$i]['asignaciones'][$con_ind_a]['monto'] = number_format($personal[$i]['asignaciones'][$con_ind_a]['monto'] / 2,2);
		}
		else
		{
			$con_ind_d = $con_ind_d + 1;
			$personal[$i]['deducciones'][$con_ind_d]['nombre'] = $asid_deducciones[$m]['nombre'];
			$personal[$i]['deducciones'][$con_ind_d]['tipo'] = $tipo;
			$tipo_calc = $asid_deducciones[$m]['tipo_calc'];
			if ("$tipo_calc" == "M")
			{
				$personal[$i]['deducciones'][$con_ind_d]['monto'] = $asid_deducciones[$m]['monto'];
			}
			else
			{
				if ("$tipo_calc" == "P")
				{
					$personal[$i]['deducciones'][$con_ind_d]['monto'] = $minimo * $asid_deducciones[$m]['porc'] / 100;
				}
				else
				{
					$calculo = $minimo.$asid_deducciones[$m]['formula'];
					$personal[$i]['deducciones'][$con_ind_d]['monto'] = calculo($calculo);
				}
			}
			$personal[$i]['deducciones'][$con_ind_d]['monto'] = number_format($personal[$i]['deducciones'][$con_ind_d]['monto'] / 2,2);
		}
	}
	$cuenta_a = count($personal[$i]['asignaciones']);
	$personal[$i]['asignaciones'][$cuenta_a+1]['nombre'] = "COMPLEMENTO DE SUELDO Y SALARIO";
	$personal[$i]['asignaciones'][$cuenta_a+1]['tipo'] = "A";	
	$personal[$i]['asignaciones'][$cuenta_a+1]['monto'] = $complemento / 2;	
	
	$personal[$i]['asignaciones'][$cuenta_a+2]['nombre'] = "SUELDO";
	$personal[$i]['asignaciones'][$cuenta_a+2]['tipo'] = "A";	
	$personal[$i]['asignaciones'][$cuenta_a+2]['monto'] = $minimo / 2;	
	
	$cuenta_d = count($personal[$i]['deducciones']);
	$personal[$i]['deducciones'][$cuenta_d+1]['nombre'] = "S.S.O";
	$personal[$i]['deducciones'][$cuenta_d+1]['tipo'] = "D";
	$personal[$i]['deducciones'][$cuenta_d+1]['monto'] = ($minimo + $personal[$i]['monto_sso'] + $complemento) * 12 / 52 * $dias_lunes * 4 / 100;
	$personal[$i]['deducciones'][$cuenta_d+1]['monto'] = number_format($personal[$i]['deducciones'][$cuenta_d+1]['monto'] / 2, 2); 
	
	$personal[$i]['deducciones'][$cuenta_d+2]['nombre'] = "LPH";
	$personal[$i]['deducciones'][$cuenta_d+2]['tipo'] = "D";
	$personal[$i]['deducciones'][$cuenta_d+2]['monto'] = ($minimo + $personal[$i]['monto_lph'] + $complemento) * 1 / 100;
	$personal[$i]['deducciones'][$cuenta_d+2]['monto'] = number_format($personal[$i]['deducciones'][$cuenta_d+2]['monto'] / 2,2);
	
	$personal[$i]['deducciones'][$cuenta_d+3]['nombre'] = "LPF";
	$personal[$i]['deducciones'][$cuenta_d+3]['tipo'] = "D";
	$personal[$i]['deducciones'][$cuenta_d+3]['monto'] = ($minimo + $personal[$i]['monto_lpf'] + $complemento) * 12 / 52 * $dias_lunes * 0.5 / 100;
	$personal[$i]['deducciones'][$cuenta_d+3]['monto'] = number_format($personal[$i]['deducciones'][$cuenta_d+3]['monto'] / 2,2);
	
	$total_asig = 0;
	if (isset($personal[$i]['asignaciones']))
	{
		foreach ($personal[$i]['asignaciones'] as $t=>$r)
		{
			$total_asig = $total_asig + $personal[$i]['asignaciones'][$t]['monto'];
		}
		$personal[$i]['total_asig'] = number_format($total_asig,2);
	}
	$total_ded = 0;
	if (isset($personal[$i]['deducciones']))
	{
		foreach ($personal[$i]['deducciones'] as $u=>$w)
		{
			$total_ded = $total_ded + $personal[$i]['deducciones'][$u]['monto'];
		}
		$personal[$i]['total_ded'] = number_format($total_ded,2);
	}
	$personal[$i]['neto'] = number_format($total_asig - $total_ded,2);
	
	$t_a = $personal[$i]['total_asig'];
	$t_d = $personal[$i]['total_ded'];
	$neto = $personal[$i]['neto'];
	enviar_sql("INSERT INTO pagos (id,personal_id,clasificacion_id,quincena,fecha_desde,fecha_hasta,salario,total_asig,total_deducciones,neto) 
	VALUES ('','$personal_id','$clasi','$quincena','$fecha_desde','$fecha_hasta','$minimo','$t_a','$t_d','$neto');");
	$pago_id = sql2value("SELECT id FROM pagos ORDER BY id DESC LIMIT 0,1");	
	if (isset($personal[$i]['asignaciones']))
	{
		foreach ($personal[$i]['asignaciones'] as $s=>$c)
		{
			$nombre_asig = $personal[$i]['asignaciones'][$s]['nombre'];
			$tipo_asig = $personal[$i]['asignaciones'][$s]['tipo'];
			$monto_asig = $personal[$i]['asignaciones'][$s]['monto'];
			enviar_sql("INSERT INTO pagos_asig_ded (id,pago_id,asig_nombre,tipo,monto) 
			VALUES ('','$pago_id','$nombre_asig','$tipo_asig','$monto_asig');");
		}
	}
	if (isset($personal[$i]['deducciones']))
	{
		foreach ($personal[$i]['deducciones'] as $h=>$k)
		{
			$nombre_ded = $personal[$i]['deducciones'][$h]['nombre'];
			$tipo_ded = $personal[$i]['deducciones'][$h]['tipo'];
			$monto_ded = $personal[$i]['deducciones'][$h]['monto'];
			enviar_sql("INSERT INTO pagos_asig_ded (id,pago_id,asig_nombre,tipo,monto) 
			VALUES ('','$pago_id','$nombre_ded','$tipo_ded','$monto_ded');");
		}
	}
}
$smarty->disp();