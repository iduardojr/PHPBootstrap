<?php 
use PHPBootstrap\Widget\Button\ButtonToolbar;
use PHPBootstrap\Widget\Button\ButtonGroup;
use PHPBootstrap\Widget\Dropdown\DropdownHeader;
use PHPBootstrap\Widget\Dropdown\DropdownDivider;
use PHPBootstrap\Widget\Dropdown\DropdownLink;
use PHPBootstrap\Widget\Dropdown\Dropdown;
use PHPBootstrap\Widget\Dropdown\TgDropdown;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Action\Action;
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>Button</em>
		<?php
		$drop = new Dropdown();
		$drop->addItem(new DropdownLink('Action'));
		$drop->addItem(new DropdownLink('Another Action'));
		$drop->addItem(new DropdownLink('Sommething else here'));
		$drop->addItem(new DropdownDivider());
		$drop->addItem(new DropdownHeader('Header'));
		$drop->addItem(new DropdownLink('Separated link'));
		
		$ui = new Button('Save', new TgDropdown($drop));
		$ui->render();
		?>
		
		<?php 
		$ui->setIcon(new Icon('icon-ok'));
		$ui->render();
		?>
		
		<?php 
		$ui->setTooltip(new Tooltip('Title'));
		$ui->render();
		?>
		
		<?php 
		$ui->setToggle(new TgLink(new Action('Test')));
		$ui->render();
		?>
		
		<?php		
		$ui->setStyle(Button::Danger);
		$ui->render();
		?>
		
		<?php
		$ui->setStyle(Button::Info);
		$ui->render();
		?>
		
		<?php
		$ui->setStyle(Button::Inverse);
		$ui->render();
		?>
		
		<?php
		$ui->setStyle(Button::Link);
		$ui->render();
		?>
		
		<?php
		$ui->setStyle(Button::Success);
		$ui->render();
		?>
		
		<?php
		$ui->setStyle(Button::Primary);
		$ui->render();
		?>
		
		<?php
		$ui->setSize(Button::Mini);
		$ui->render();
		?>
		
		<?php
		$ui->setSize(Button::Small);
		$ui->render();
		?>
		
		<?php
		$ui->setSize(Button::Large);
		$ui->render();
		?>
		<br><br><br>
		<?php
		$ui->setBlock(true);
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Button Group</em>
		<?php
		$ui = new ButtonGroup(new Button('Save'), new Button('Remove', new TgDropdown($drop)));
		$ui->render();
		?>
		<?php
		$ui = new ButtonGroup(new Button(new Icon('icon-align-left')), 
							  new Button(new Icon('icon-align-center')),
							  new Button(new Icon('icon-align-right')),
							  new Button(new Icon('icon-align-justify')));
		$ui->setVertical(true);
		$ui->render();
		?>
	</div>	
	<div class="block">
		<em>Button Toolbar</em>
		<?php
		$ui->setVertical(false);
		
		$w2 = new ButtonToolbar('toolbar');
		$w2->addButtonGroup($ui);
		$w2->addButtonGroup($ui);
		$w2->addButtonGroup($ui);
		$w2->render();
		?>
	</div>
</fieldset>