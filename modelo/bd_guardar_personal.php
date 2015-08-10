<?php
function bd_guardar_personal($d)
{
	enviar_sql("INSERT INTO personal (id,nac,cedula,nombre,apellido,login,clave,nivel_id,estado) 
	VALUES ('','$d[nac]','$d[cedula]','$d[nombre]','$d[apellido]','$d[login]',MD5('$d[clave]'),'$d[nivel_id]','ACTIVO');");
	
	enviar_sql("INSERT INTO personal_datos (personal_id,cargo_id,direccion,tlf_fijo,tlf_movil,correo,fecha_ing,foto,grado_instruccion_id,profesion_id,salario) 
	VALUES ('','$d[cargo_id]','$d[direccion]','$d[tlf_fijo]','$d[tlf_movil]','$d[correo]','$d[fecha_ing]','$d[foto]','$d[grado_instruccion_id]',
	'$d[profesion_id]','$d[salario]');");
}