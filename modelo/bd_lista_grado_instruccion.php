<?php
function bd_lista_grado_instruccion()
{
	return sql2opciones("SELECT id,nombre FROM grado_instruccion ORDER BY id ASC");
}