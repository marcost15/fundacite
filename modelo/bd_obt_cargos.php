<?php
function bd_obt_cargos($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM cargos ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM cargos WHERE id = $id");
	}
}
