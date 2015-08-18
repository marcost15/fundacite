<?php
function bd_lista_departamentos()
{
	return sql2opciones("SELECT id,nombre FROM departamentos ORDER BY id ASC");
}