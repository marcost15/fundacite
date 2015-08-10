<?php
function bd_obt_grado_instruccion($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM grado_instruccion ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM grado_instruccion WHERE id = $id");
	}
}
