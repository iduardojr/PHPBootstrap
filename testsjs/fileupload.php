<?php 
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\FileUpload\TgFileUpload;
use PHPBootstrap\Widget\Dropdown\DropdownLink;
use PHPBootstrap\Widget\Dropdown\Dropdown;
use PHPBootstrap\Widget\Dropdown\TgDropdown;
use PHPBootstrap\Widget\Action\Action;
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>File Upload</em>
		<?php
		$drop = new Dropdown();
		$drop->addItem(new DropdownLink('File Upload', new TgFileUpload(new Action('File'), 'tgfile')));
		$ui = new Button('Images Teste', new TgDropdown($drop));
		$ui->setName('upload');
		$ui->render();
		?>
		<br clear="all">
		<br clear="all">
		<div id="response"></div>
		<a href="#" class="btn" data-params="1">Disable</a>
		<a href="#" class="btn" data-params="0">Enable</a>
	</div>
	<script type="text/javascript">
	$(function() {
		$('[data-params]').click(function(){
			$('#upload').field('disabled', $(this).data('params'));
			return false;
		});
	});
	</script>
</fieldset>