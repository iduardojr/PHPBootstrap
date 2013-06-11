<?php 
use PHPBootstrap\Widget\Tab\TgTab;
use PHPBootstrap\Widget\Nav\TabPane;
use PHPBootstrap\Widget\Nav\Tabbable;
use PHPBootstrap\Widget\Nav\NavDivider;
use PHPBootstrap\Widget\Nav\NavBar;
use PHPBootstrap\Widget\Dropdown\DropdownHeader;
use PHPBootstrap\Widget\Dropdown\DropdownDivider;
use PHPBootstrap\Widget\Dropdown\DropdownLink;
use PHPBootstrap\Widget\Dropdown\TgDropdown;
use PHPBootstrap\Widget\Nav\NavLink;
use PHPBootstrap\Widget\Nav\Nav;
use PHPBootstrap\Widget\Nav\NavBrand;
use PHPBootstrap\Widget\Dropdown\Dropdown;

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
		<em>Tabs</em>
		<?php
		$ui = new Nav();
		$ui->addItem(new NavLink('Section #1'));
		$ui->addItem(new NavDivider());
		$ui->addItem(new NavLink('Section #2'));
		$ui->addItem(new NavDivider());
		$ui->addItem(new NavLink('Section #3'));
		$ui->addItem(new NavDivider());
		
		$drop = new Dropdown();
		$drop->addItem(new DropdownLink('Action'));
		$drop->addItem(new DropdownLink('Another Action'));
		$drop->addItem(new DropdownLink('Sommething else here'));
		$drop->addItem(new DropdownDivider());
		$drop->addItem(new DropdownHeader('Header'));
		$drop->addItem(new DropdownLink('Separated link'));
		$ui->addItem(new NavLink('DropDown', new TgDropdown($drop)));
		
		$ui->setStyle(Nav::Tabs);
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Pills</em>
		<?php
		$ui->setStyle(Nav::Pills);
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>NavBar</em>
		<?php
		$w2 = new NavBar('navbar');
		$w2->setInverse(true);
		$w2->addItem(new NavBrand('Brand'));
		$w2->addItem($ui);
		$w2->render();
		?>
	</div>
	<div class="block">
		<em>Tabbable</em>
		<?php
		$w2 = new Tabbable('tabs');
		$w2->addItem(new NavLink('Section #1'), null, new TabPane('<h2>Section #1</h2>'.$text));
		$w2->addItem(new NavLink('Section #2'), null, new TabPane('<h2>Section #2</h2>'.$text));
		$w2->addItem(new NavLink('Section #3'), null, new TabPane('<h2>Section #3</h2>'.$text));
		
		$drop = new DropDown();
		$pane1 = new TabPane('<h2>Section #4</h2>'.$text);
		$pane2 = new TabPane('<h2>Section #5</h2>'.$text);
		$drop->addItem(new DropdownLink('Section #4', new TgTab($pane1)));
		$drop->addItem(new DropdownLink('Section #5', new TgTab($pane2)));
		$w2->addItem(new NavLink('DropDown', new TgDropdown($drop)), null, $pane1, $pane2);
		$w2->setPlacement(Tabbable::Left);
		$w2->render();
		?>
	</div>
</fieldset>