<?php 
use PHPBootstrap\Widget\Misc\Alert;
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>Alert</em>
		<?php
		$ui = new Alert('Warning! Best check yo self, you\'re not looking too good.', Alert::Error);
		$ui->render();
		?>
	</div>
</fieldset>