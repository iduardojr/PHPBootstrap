<?php 
use PHPBootstrap\Widget\Misc\Anchor;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgWindows;
use PHPBootstrap\Widget\Action\TgAjax;
?>
<fieldset>
	<legend>Test Toggles JavaScript</legend>
	<div class="block">
		<em>TgLink</em>
		<?php
		$ui = new Anchor('TgLink');
		$ui->setName('tglink');
		$ui->setToggle(new TgLink(new Action('Test')));
		$ui->render();
		?>
		<?php
		$ui->setName('tglink-disabled');
		$ui->setDisabled(true);
		$ui->render();
		?>
		<hr>
		<a href="#tglink" class="btn btn-primary">Toggle</a>
		<a href="#tglink-disabled" class="btn btn-info">Toggle</a>
	</div>
	<div class="block">
		<em>TgWindows</em>
		<?php
		$ui = new Anchor('TgWindows');
		$ui->setName('tgwindows');
		$toggle = new TgWindows(new Action('Test'));
		$ui->setToggle($toggle);
		$ui->render();
		?>
		<?php
		$ui->setName('tgwindows-disabled');
		$ui->setDisabled(true);
		$ui->render();
		?>
		<hr>
		<a href="#tgwindows" class="btn btn-primary">Toggle</a>
		<a href="#tgwindows-disabled" class="btn btn-info">Toggle</a>
	</div>
	<div class="block">
		<em>TgWindows Features</em>
		<?php
		$toggle->setSize(100, 200);
		$ui->setName('tgwindowsf');
		$ui->setDisabled(false);
		$ui->render();
		?>
		<?php
		$ui->setName('tgwindowsf-disabled');
		$ui->setDisabled(true);
		$ui->render();
		?>
		<hr>
		<a href="#tgwindowsf" class="btn btn-primary">Toggle</a>
		<a href="#tgwindowsf-disabled" class="btn btn-info">Toggle</a>
	</div>
	<div class="block">
		<em>TgAjax</em>
		<div id="content"></div>
		<?php
		$ui = new Anchor('TgAjax');
		$ui->setName('tgajax');
		$toggle = new TgAjax(new Action('Test'), 'content');
		$ui->setToggle($toggle);
		$ui->render();
		?>
		<?php
		$ui->setName('tgajax-disabled');
		$ui->setDisabled(true);
		$ui->render();
		?>
		<hr>
		<a href="#tgajax" class="btn btn-primary">Toggle</a>
		<a href="#tgajax-disabled" class="btn btn-info">Toggle</a>
	</div>
	<div class="block">
		<em>TgAjax JSON</em>
		<div id="name"></div>
		<?php
		$toggle->setResponse(TgAjax::Json);
		$toggle->getAction()->setParameter('json', 1);
		
		$ui->setName('tgajax-json');
		$ui->setDisabled(false);
		$ui->render();
		?>
		<?php
		$ui->setName('tgajax-json-disabled');
		$ui->setDisabled(true);
		$ui->render();
		?>
		<hr>
		<a href="#tgajax-json" class="btn btn-primary">Toggle</a>
		<a href="#tgajax-json-disabled" class="btn btn-info">Toggle</a>
	</div>
	<a id="create" class="btn" href="#">Create Toggle</a>
	<script type="text/javascript">
	$('#name').on('update', function( e, value ){
		$('#name').html('My name is ' + value);
		return false;
	});
	$('.btn').click( function( e ) {
		$($(this).attr('href')).trigger('toggle');
		return false;
	});
	$('#create').click(function() {
		$('body').append('<a href="?class=Test&json=1" target="content" data-response="json">Toggle</a>');
	});
	</script>
</fieldset>