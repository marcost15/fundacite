<?php /* Smarty version 2.6.26, created on 2015-09-03 15:48:00
         compiled from ../menu/menu.html */ ?>
﻿<?php if ($_SESSION['usuario']['nivel_id'] == '1'): ?>
<li><a href="#"><span>Admin BD</span></a>
	<ul>
		<li title="Asignaciones y Deducciones"><a href="asigna_deduce.php">Asignaciones y Deducciones</a></li>
		<li title="Cargos"><a href="cargos.php">Cargos</a></li>
		<li title="Clasificacion"><a href="clasificaciones.php">Clasificaciones</a></li>
		<li title="Departamentos"><a href="departamentos.php">Departamentos</a></li>
		<li title="profesiones"><a href="profesiones.php">Profesiones</a></li>
		<li title="Grado de Instruccion"><a href="grado_instruccion.php">Grado de Instruccion</a></li>
		<li title="Niveles"><a href="niveles.php">Niveles</a></li>
		<li title="Privilegios"><a href="privilegios.php">Privilegios</a></li>
	</ul>
</li>
<li><a href="pagos.php">Pagos</a></li>
<li><a href="#"><span>Personal</span></a>
	<ul>
		<li title="Agregar Usuarios"><a href="registrar_personal.php">Agregar</a></li>
		<li title="Consultar / Modificar Usuarios"><a href="consmod_personal.php">Consultar / Modificar</a></li>
		<li title="Cambiar Clave"><a href="cambiar_clave.php">Cambiar Clave</a></li> 
	</ul>
</li>
<?php endif; ?>
<li><a href="#"><span>Reportes</span></a>
	<ul>
		<li><a href="rp_cons_trabajo.php">Constancia de Trabajo</a></li>
		<li><a href="rp_frm_recibo.php">Recibos de Pagos</a></li>
	</ul>
</li>
<li class="topfirst"><a href="index.php">Salir</a></li>