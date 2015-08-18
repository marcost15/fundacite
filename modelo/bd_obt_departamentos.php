<?php
function bd_obt_departamentos($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM departamentos ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM departamentos WHERE id = $id");
	}
}
