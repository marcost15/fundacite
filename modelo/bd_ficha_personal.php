<?php
function bd_ficha_personal($id)
{
	$sql = "SELECT  id,nac,cedula,apellido,nombre,login,nivel_id,estado,direccion,tlf_fijo,tlf_movil,correo,fecha_ing,estado,foto,cargo_id,profesion_id,
					grado_instruccion_id,salario,cargo_id,clasificacion_id
					FROM personal,personal_datos
					WHERE id = '$id' and personal_id = '$id'
					LIMIT 0,1";
	return sql2row($sql);
}