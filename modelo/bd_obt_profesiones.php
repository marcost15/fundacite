<?php
function bd_obt_profesiones($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM profesiones ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM profesiones WHERE id = $id");
	}
}
