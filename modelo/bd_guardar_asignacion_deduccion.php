<?php
function bd_guardar_asignacion_deduccion($d)
{
	$asig_ded_id = $d['asig_ded_id'];
	$clasi = $d['clasificacion_id'];
	enviar_sql("DELETE FROM clasificacion_asig_deduccion WHERE clasificacion_id = '$clasi';");
	foreach($asig_ded_id as $i=>$m)
	{
		$asig_ded_id1 = $asig_ded_id[$i];
		enviar_sql("INSERT INTO clasificacion_asig_deduccion (id,clasificacion_id,asig_ded_id) 
		VALUES ('','$clasi','$asig_ded_id1');");
	}
}