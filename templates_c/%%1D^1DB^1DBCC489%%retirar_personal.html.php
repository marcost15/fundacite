<?php /* Smarty version 2.6.26, created on 2015-08-10 04:17:01
         compiled from retirar_personal.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Retirar Personal')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h3>ATENCIÓN</h3>
<p>Usted esta a punto de retirar a:</p>
<table class = "retiro" align = "center" border="1">
<?php if ($this->_tpl_vars['ficha']['foto']): ?>
<div id = "foto15"><img src="./upload/personal/<?php echo $this->_tpl_vars['ficha']['foto']; ?>
" width="120" height="120" /></div>
<?php endif; ?>
	<tr>
		<th>Cedula</th>
		<td><?php echo $this->_tpl_vars['ficha']['nac']; ?>
-<?php echo $this->_tpl_vars['ficha']['cedula']; ?>
</td>
	</tr>
	<tr>
		<th>Apellido</th>
		<td><?php echo $this->_tpl_vars['ficha']['apellido']; ?>
</td>
	</tr>
	<tr>
		<th>Nombre</th>
		<td><?php echo $this->_tpl_vars['ficha']['nombre']; ?>
</td>
	</tr>
	<tr>
		<th>Dirección</th>
		<td><?php echo $this->_tpl_vars['ficha']['direccion']; ?>
</td>
	</tr>
	<?php if ($this->_tpl_vars['ficha']['tlf_fijo']): ?>
	<tr>
		<th>Telefono Fijo</th>
		<td><?php echo $this->_tpl_vars['ficha']['tlf_fijo']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['tlf_movil']): ?>
	<tr>
		<th>Telefono Movil</th>
		<td><?php echo $this->_tpl_vars['ficha']['tlf_movil']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['correo']): ?>
	<tr>
		<th>Correo electronico</th>
		<td><?php echo $this->_tpl_vars['ficha']['correo']; ?>
</td>
	</tr>
	<?php endif; ?>
	<tr>
		<th>Nombre de Usuario</th>
		<td><?php echo $this->_tpl_vars['ficha']['login']; ?>
</td>
	</tr>
	<tr>
		<th>Estado</th>
		<td><?php echo $this->_tpl_vars['ficha']['estado']; ?>
</td>
	</tr>
	<tr>
		<th>Nivel de Acceso</th>
		<td><?php echo $this->_tpl_vars['ficha']['nivel_id']; ?>
</td>
	</tr>
</table>
<hr />
<p>¿Esta seguro de que desea hacerlo?</p>
<hr />	
<div align="left"><a href="consmod_personal.php"><img onmouseover='overlib("<strong>No retirar</strong>",WIDTH, 70)' src="./imagenes/flecha_izquierda.gif" width="70" height="40" onmouseout='return nd();'/></a></div>
<hr />
<div align="right"><a href="retirar_personal2.php?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
"><img onmouseover='overlib("<strong>Si, retirar</strong>",WIDTH, 70)' src="./imagenes/pensil.png" width="60" height="70" onmouseout='return nd();'/></a></div>
<hr />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>