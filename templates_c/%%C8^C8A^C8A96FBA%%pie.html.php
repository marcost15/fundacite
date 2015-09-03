<?php /* Smarty version 2.6.26, created on 2015-09-03 15:48:00
         compiled from pie.html */ ?>
<!-- /Contenido-->
			</div><!-- contenido -->	
			<div id="pie">Dirección: Av. Medina Angarita Sector Carmona, Edif. Doña Lucia, Planta Baja.  Trujillo, Estado Trujillo,</br>
Venezuela Telefax: 0272-236.52.75.  RIF: G–20007798–0
                  </div><!-- pie -->		
		</div><!-- fondo -->	
	</body>
</html>
<?php echo '
<script>
$(document).ready(function(){
   	$(".claseiframe").fancybox({
				\'width\'				: \'98%\',
				\'height\'			: \'98%\',
				\'autoScale\'			: false,
				\'transitionIn\'		: \'elastic\',
				\'transitionOut\'		: \'elastic\',
				\'type\'				: \'iframe\'
			});
});

$(document).ready(function(){
   	$(".claseiframe2").fancybox({
				\'width\'				: \'48%\',
				\'height\'			: \'35%\',
				\'autoScale\'			: false,
				\'transitionIn\'		: \'elastic\',
				\'transitionOut\'		: \'elastic\',
				\'type\'				: \'iframe\'
			});
});

var myWindow;
function openCenteredWindow(width, height, url) {
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + 
        ",status,resizable,left=" + left + ",top=" + top + 
        ",screenX=" + left + ",screenY=" + top;
    myWindow = window.open(url, "subWind", windowFeatures);
}
</script>
'; ?>