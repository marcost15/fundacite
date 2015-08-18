<?php /* Smarty version 2.6.26, created on 2015-08-18 06:18:38
         compiled from calculo_pago.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="mensaje">
<p> GENERANDO RECIBOS...ESPERE POR FAVOR, SERÁ REDIRECCIONADO EN 5 SEGUNDOS...</p> 
</div>
<div><center><img src="./imagenes/procesando.png"/></center></div>
<?php echo '
<script type="text/javascript"> 
function redireccionar(){ 
  window.location="pagos.php"; 
}  
setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos 
</script> 
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>