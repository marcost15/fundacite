<?php /* Smarty version 2.6.26, created on 2015-08-25 17:20:11
         compiled from modificar_personal.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Modificar Personal')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_tpl_vars['f1']; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
	var f1 = new LiveValidation(\'cedula\'); f1.add( Validate.Presence ); f1.add( Validate.Numericality ); f1.add( Validate.Length, { minimum: 7 } );
	var f2 = new LiveValidation(\'nombre\'); f2.add( Validate.Presence ); 
	var f3 = new LiveValidation(\'apellido\'); f3.add( Validate.Presence ); 
	var f4 = new LiveValidation(\'direccion\'); f4.add( Validate.Presence ); 
	var f6 = new LiveValidation(\'tlf_fijo\'); f6.add( Validate.Length, { minimum: 7 } );
	var f10 = new LiveValidation(\'tlf_movil\'); f10.add( Validate.Length, { minimum: 7 } );
	var f9 = new LiveValidation(\'correo\'); f9.add( Validate.Email );
	var f11 = new LiveValidation(\'salario\'); f11.add( Validate.Presence ); f11.add( Validate.Numericality );
	var f12 = new LiveValidation(\'salario2\'); f12.add( Validate.Presence ); f12.add( Validate.Numericality );
</script>
'; ?>