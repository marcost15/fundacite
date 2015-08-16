<?php
function bd_lista_asigna_deduce()
{
	return sql2opciones("SELECT id,nombre FROM asig_deducciones ORDER BY id ASC");
}