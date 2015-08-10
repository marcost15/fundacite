<?php
function bd_lista_clasificacion()
{
	return sql2opciones("SELECT id,nombre FROM clasificaciones ORDER BY id ASC");
}