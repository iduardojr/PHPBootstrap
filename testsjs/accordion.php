<?php 
use PHPBootstrap\Widget\Misc\Paragraph;
use PHPBootstrap\Widget\Accordion\AccordionItem;
use PHPBootstrap\Widget\Accordion\Accordion;
$text = 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
		3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. 
		Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
		Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. 
		Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, 
		raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.';
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>Accordion</em>
		<?php
		$ui = new Accordion('teste');
		$ui->addItem(new AccordionItem('Collapsible Group Item #1', new Paragraph($text)));
		$ui->addItem(new AccordionItem('Collapsible Group Item #2', new Paragraph($text)));
		$ui->addItem(new AccordionItem('Collapsible Group Item #3', new Paragraph($text)));
		$ui->addItem(new AccordionItem('Collapsible Group Item #4', new Paragraph($text)));
		$ui->render();
		?>
	</div>
</fieldset>