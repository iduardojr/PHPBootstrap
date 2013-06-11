<?php 
use PHPBootstrap\Widget\Modal\TgModalLoad;
use PHPBootstrap\Widget\Modal\TgModalConfirm;
use PHPBootstrap\Widget\Modal\TgModalOpen;
use PHPBootstrap\Widget\Modal\TgModalClose;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Widget\Modal\Modal;
use PHPBootstrap\Widget\Layout\Panel;
use PHPBootstrap\Widget\Action\TgAjax;
use PHPBootstrap\Widget\Action\Action;

$text = '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
		3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. 
		Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
		Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. 
		Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, 
		raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</p>';
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>Modal</em>
		<?php
		$ui = new Modal('modal1', new Title('Modal Header', 3), new Panel($text));
		$ui->addButton(new Button('Ok', new TgModalConfirm()));
		$ui->addButton(new Button('Cancel', new TgModalClose()));
		$ui->setHide(true);
		$ui->render();
		 
		$button = new Button('Open Modal', new TgModalOpen($ui, new TgAjax(new Action('Modal'), 'container')));
		$button->render();
		?>
		<?php 
		$ui->setName('modal2');
		$ui->render();
		
		$button = new Button('Load Modal', new TgModalLoad(new Action('Modal'), $ui));
		$button->render();
		?>
	</div>
	<div id="container"></div>
</fieldset>