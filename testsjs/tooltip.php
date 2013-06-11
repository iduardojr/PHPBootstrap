<?php 
use PHPBootstrap\Widget\Tooltip\Popover;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Misc\Anchor;
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>Tooltip</em>
		<?php
		$ui = new Anchor('Tooltip');
		$ui->setTooltip(new Tooltip('Titulo'));
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Popover</em>
		<?php 
		$ui->setLabel('Popover');
		$ui->setTooltip(new Popover('Titulo', 'Warning! Best check yo self, you\'re not looking too good.'));
		$ui->render();
		?>
	</div>
</fieldset>