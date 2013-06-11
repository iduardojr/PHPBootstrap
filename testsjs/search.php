<?php 
use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Widget\Modal\Modal;
use PHPBootstrap\Widget\Form\Controls\ResearchBox;
use PHPBootstrap\Widget\Form\Controls\CheckBox;
use PHPBootstrap\Widget\Form\Controls\SeekBox;
use PHPBootstrap\Widget\Form\Controls\TextBox;
use PHPBootstrap\Widget\Form\Controls\Label;
use PHPBootstrap\Widget\Action\Action;
?>
<fieldset>
	<div id="box-person" class="well">
		<?php
		$ui = new Label('ID');
		$ui->render();
		$ui = new TextBox('id');
		$ui->setDisabled(true);
		$ui->render();
		$ui = new Label('Name');
		$ui->render();
		$ui = new TextBox('name');
		$ui->render();
		$ui = new Label('Birthday');
		$ui->render();
		$ui = new TextBox('birthday');
		$ui->render();
		$ui = new CheckBox('status', 'Ativo');
		$ui->render();
	?>
	</div>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>Seek</em>
		<?php
		$ui = new SeekBox('seek', new Action('Seek'));
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Search</em>
		<?php
		$modal = new Modal('output', new Title('Resultados'));
		$modal->setHide(true);
		$modal->render();
		
		$ui = new ResearchBox('research', new Action('Research'), $modal);
		$ui->render();
		?>
	</div>
	<script type="text/javascript">
	$(function() {
		$('[data-params]').click(function(){
			$($(this).attr('href')).field('disabled', $(this).data('params'));
			return false;
		});
		$('body').on('loadedaction', '[data-column-action="choise"]', function(){
			$(this).closest('.modal').modal('hide');
		});
	});
	</script>
</fieldset>