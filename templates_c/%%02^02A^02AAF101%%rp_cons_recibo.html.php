<?php /* Smarty version 2.6.26, created on 2015-08-18 07:31:54
         compiled from rp_cons_recibo.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['pagos']): ?>
<div id = "constancia">	
<p>
<h3>RECIBO DE PAGO</h3>
</p>
</p>
	Por medio de la presente se hace constar que la <b><?php echo $this->_tpl_vars['datos']['grado_instruccion_id']; ?>
 <?php echo $this->_tpl_vars['datos']['nombre']; ?>
 <?php echo $this->_tpl_vars['datos']['apellido']; ?>
</b> , Clasificada como 
	<b><?php echo $this->_tpl_vars['datos']['clasificacion_id']; ?>
</b>, de Fundacite Trujillo, titular de la Cédula de Identidad:<b><?php echo $this->_tpl_vars['datos']['nac']; ?>
-<?php echo $this->_tpl_vars['datos']['cedula']; ?>
</b>, 
	la cual labora en el área  de <b><?php echo $this->_tpl_vars['datos']['departamento_id']; ?>
</b>; recibió de la Fundación para el desarrollo de la Ciencia en el Estado Trujillo 
	la cantidad de <b>Bs. <?php echo $this->_tpl_vars['pagos']['neto']; ?>
</b> correspondiente al período desde el <b><?php echo $this->_tpl_vars['pagos']['fecha_desde']; ?>
</b> hasta el <b><?php echo $this->_tpl_vars['pagos']['fecha_hasta']; ?>
</b>, 
	por los siguientes conceptos:
</p>

<div id="tabla1">
<table class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>CONCEPTOS ASIGNACIONES</th>
		<th>MONTO</th>
	</tr>
</thead>
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['pagos_asig_ded']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
	<tr>
		<?php if ($this->_tpl_vars['pagos_asig_ded'][$this->_sections['p']['index']]['tipo'] == 'A'): ?>
			<td><?php echo $this->_tpl_vars['pagos_asig_ded'][$this->_sections['p']['index']]['asig_nombre']; ?>
</td>
			<td><?php echo $this->_tpl_vars['pagos_asig_ded'][$this->_sections['p']['index']]['monto']; ?>
</td>
		<?php endif; ?>
	</tr><?php endfor; endif; ?>
</tbody>
<thead>
	<tr> 
		<th>TOTAL ASIGNACIONES</th>
		<th><?php echo $this->_tpl_vars['pagos']['total_asig']; ?>
</th>
	</tr>
</thead>
</table>
</div>
<div id="tabla2">
<table class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>CONCEPTOS DEDUCCIONES</th>
		<th>MONTO</th>
	</tr>
</thead>
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['pagos_asig_ded']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
	<tr>
		<?php if ($this->_tpl_vars['pagos_asig_ded'][$this->_sections['p']['index']]['tipo'] == 'D'): ?>
			<td><?php echo $this->_tpl_vars['pagos_asig_ded'][$this->_sections['p']['index']]['asig_nombre']; ?>
</td>
			<td><?php echo $this->_tpl_vars['pagos_asig_ded'][$this->_sections['p']['index']]['monto']; ?>
</td>
		<?php endif; ?>
	</tr><?php endfor; endif; ?>
</tbody>
<thead>
	<tr> 
		<th>TOTAL DEDUCCIONES</th>
		<th><?php echo $this->_tpl_vars['pagos']['total_deducciones']; ?>
</th>
	</tr>
</thead>
</table>
</div>
<table class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>NETO</th>
		<th><?php echo $this->_tpl_vars['pagos']['neto']; ?>
</th>
	</tr>
</thead>
</table>

	En Trujillo, a los <?php echo $this->_tpl_vars['fecha']; ?>

<p class="firma">
		<br />
		<center><hr width="300px" /></center>
		<center><b><?php echo $this->_tpl_vars['datos']['grado_instruccion_id']; ?>
 <?php echo $this->_tpl_vars['datos']['nombre']; ?>
 <?php echo $this->_tpl_vars['datos']['apellido']; ?>
</b></center>
		<center> <b>C.I <?php echo $this->_tpl_vars['datos']['nac']; ?>
-<?php echo $this->_tpl_vars['datos']['cedula']; ?>
</b></center>
</div>
</p>
<?php else: ?>
<h3>AUN NO SE HA GENERADO EL PERIODO DE PAGO SOLICITADO, VERIFIQUE...</h3>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>