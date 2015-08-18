<?php /* Smarty version 2.6.26, created on 2015-08-18 01:44:30
         compiled from rp_cons_trabajo.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id = "constancia">	
<p>
<h2>CONSTANCIA</h2>
</p>
</p>
	Quien suscribe, <b>Msc. Ulises Jesús Osorio Paredes</b>, Venezolano, titular de la Cédula de Identidad Nº <b>V-15.356.056, 
	Director Ejecutivo</b> de la <b>Fundación para	el Desarrollo de la Ciencia y la Tecnología en el Estado Trujillo (Fundacite Trujillo)</b>, 
	adscrita al Ministerio del Poder Popular para Educación Universitaria,
	Ciencia y Tecnología, designado según  Resolución N° 04-2015 de Fecha 05/06/2015; por medio de presente hace constar que el ciudadano(a): 
	<b><?php echo $this->_tpl_vars['datos']['nombre']; ?>
 <?php echo $this->_tpl_vars['datos']['apellido']; ?>
 </b> titular de la C&eacute;dula de Identidad:<b><?php echo $this->_tpl_vars['datos']['nac']; ?>
-<?php echo $this->_tpl_vars['datos']['cedula']; ?>
</b>,clasificada como 
	<b><?php echo $this->_tpl_vars['datos']['clasificacion_id']; ?>
</b>, Labora en <b>FUNDACITE TRUJILLO</b>, desde el <b><?php echo $this->_tpl_vars['datos']['fecha_ing']; ?>
</b> ocupando el cargo de 
	<b><?php echo $this->_tpl_vars['datos']['cargo_id']; ?>
</b> de profesión <b><?php echo $this->_tpl_vars['datos']['grado_instruccion_id']; ?>
  <?php echo $this->_tpl_vars['datos']['profesion_id']; ?>

</p>
<p> 
	Constancia que se expide a petición de parte interesada en Trujillo con fecha <?php echo $this->_tpl_vars['fecha']; ?>

</p>
<b>VA SIN ENMIENDA.</b>
</p>
<p class="firma">
		<br />
		<center><hr width="300px" /></center>
		<center><b>Msc. Ulises J. Osorio Paredes</b></center>
		<center> <b>Director Ejecutivo de Fundacite-Trujillo</b></center>
		<center>Resolución  N° 04-2015 de Fecha 005/06/2015</center>
</div>
</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>