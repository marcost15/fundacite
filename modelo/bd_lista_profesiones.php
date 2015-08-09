<?php
function bd_lista_profesiones()
{
	return sql2opciones("SELECT id,nombre FROM profesiones ORDER BY id ASC");
}