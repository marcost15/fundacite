<?php
function bd_lista_clasificacion()
{
	return sql2opciones("SELECT id,CONCAT( nombre, ', Grado ', grado ) AS nom_grado FROM clasificaciones ORDER BY id ASC");
}