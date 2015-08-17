<?php /* Smarty version 2.6.26, created on 2015-08-17 00:24:56
         compiled from asig_asociadas.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Clasificacion de Personal')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($_SESSION['mensaje']): ?>
</p>
<div id="mensaje"><?php echo $_SESSION['mensaje']; ?>
</div>
<?php endif; ?>
</p>
<div id="resultados">
<table class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
<tr>
	<th colspan="3">CLASIFICACION DEl PERSONAL</th>
</tr>
<tr>
	<th><b>NOMBRE</b></th>
	<th><b>GRADO</b></th>
	<th><b>COMPLEMENTO</b></th>
</tr>
</thead>
<tbody>
<tr>
	<td><?php echo $this->_tpl_vars['clasificacion']['nombre']; ?>
</td>
	<td><?php echo $this->_tpl_vars['clasificacion']['grado']; ?>
</td>
	<td><?php echo $this->_tpl_vars['clasificacion']['complemento']; ?>
</td>
</tr>
</tbody>
</table>
</div>
<?php echo $this->_tpl_vars['f2']; ?>

</p>
<div id="resultados">
<table class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
<tr>
	<th colspan="10">ASIGNACIONES Y DEDUCCIONES ASOCIADAS A LA CLASIFICACION</th>
</tr>
<tr>
	<td><b>NOMBRE</b></td>
	<td><b>TIPO</b></td>
	<td><b>TIPO CALCULO</b></td>
	<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['datos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<tr>
	<td><?php echo $this->_tpl_vars['datos'][$this->_sections['i']['index']]['nombre']; ?>
</td>
	<?php if ($this->_tpl_vars['datos'][$this->_sections['i']['index']]['tipo'] == 'A'): ?>
		<td>ASIGNACION</td>
	<?php else: ?>
		<td>DEDUCCION</td>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['datos'][$this->_sections['i']['index']]['tipo_calc'] == 'M'): ?>
		<td>MONTO</td>
	<?php else: ?>
		<?php if ($this->_tpl_vars['datos'][$this->_sections['i']['index']]['tipo_calc'] == 'P'): ?>
			<td>PORC</td>
		<?php else: ?>
			<td>FORMULA</td>
		<?php endif; ?>
	<?php endif; ?>
	<td align="center"><a href="?id=<?php echo $this->_tpl_vars['clasificacion']['id']; ?>
&asig_id=<?php echo $this->_tpl_vars['datos'][$this->_sections['i']['index']]['id']; ?>
&func=delete"><img onclick="return confirm('¿Esta seguro?')" onmouseover='overlib("<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
</tr>
<?php endfor; endif; ?>
</tbody>
</table>
</div>

</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
	var f1 = new LiveValidation(\'nombre\'); f1.add( Validate.Presence );
</script>
'; ?>
