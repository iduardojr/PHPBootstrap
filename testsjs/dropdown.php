<?php 
use PHPBootstrap\Widget\Dropdown\DropdownHeader;
use PHPBootstrap\Widget\Dropdown\DropdownDivider;
use PHPBootstrap\Widget\Dropdown\TgDropdown;
use PHPBootstrap\Widget\Dropdown\DropdownLink;
use PHPBootstrap\Widget\Dropdown\Dropdown;
use PHPBootstrap\Widget\Misc\Anchor;
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>DropDown</em>
		<?php
		$drop = new Dropdown();
		$drop->addItem(new DropdownLink('Action'));
		$drop->addItem(new DropdownLink('Another Action'));
		$drop->addItem(new DropdownLink('Sommething else here'));
		
		$drop2 = new Dropdown();
		$drop2->addItem(new DropdownLink('Action'));
		$drop2->addItem(new DropdownLink('Another Action'));
		$drop2->addItem(new DropdownLink('Sommething else here'));
		
		$drop->addItem(new DropdownDivider());
		$drop->addItem(new DropdownHeader('Header'));
		$drop->addItem(new DropdownLink('Separated link', new TgDropdown($drop2)));
		
		$ui = new Anchor('Dropdown');
		$ui->setToggle(new TgDropdown($drop, false, false));
		$ui->render();
		?>
	</div>
</fieldset>