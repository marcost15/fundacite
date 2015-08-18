<?php
function bd_obt_asigna_deduce($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre,tipo,tipo_calc,porc,monto,formula,sso,lph,lpf FROM asig_deducciones ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM asig_deducciones WHERE id = $id");
	}
}
