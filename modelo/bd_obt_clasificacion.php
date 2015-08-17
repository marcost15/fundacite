<?php
function bd_obt_clasificacion($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre,complemento,grado FROM clasificaciones ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM clasificaciones WHERE id = $id");
	}
}
