<?php 
use PHPBootstrap\Widget\Form\Controls\XFileBox;
use PHPBootstrap\Widget\Form\Controls\XComboBox;
use PHPBootstrap\Widget\Form\Controls\ComboBox;
use PHPBootstrap\Widget\Form\Controls\CheckBox;
use PHPBootstrap\Widget\Form\Controls\FileBox;
use PHPBootstrap\Widget\Form\Controls\PasswordBox;
use PHPBootstrap\Widget\Form\Controls\Hidden;
use PHPBootstrap\Widget\Form\Controls\RichText;
use PHPBootstrap\Widget\Form\Controls\TextArea;
use PHPBootstrap\Widget\Form\Controls\TextBox;
use PHPBootstrap\Widget\Form\Controls\Decorator\Mask;
use PHPBootstrap\Widget\Form\Controls\Decorator\TypeHead;
use PHPBootstrap\Widget\Form\Controls\Decorator\Suggest;
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Form\Controls\NumberBox;
use PHPBootstrap\Format\MoneyFormat;
use PHPBootstrap\Widget\Form\Controls\CheckBoxList;
use PHPBootstrap\Widget\Form\Controls\RadioButton;
use PHPBootstrap\Widget\Form\Controls\RadioButtonList;
use PHPBootstrap\Widget\Form\Controls\Decorator\Embed;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Validate\Pattern\Number;
use PHPBootstrap\Widget\Form\Controls\ListBox;
use PHPBootstrap\Widget\Form\Controls\ChosenBox;
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>Hidden</em>
		<?php
		$ui = new Hidden('hidden');
		$ui->render();
		?>
		<br clear="all">
		<a href="#hidden" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#hidden" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#hidden" class="btn" data-method="value" data-params='["Iduardo"]'>Set Value: 'Iduardo'</a>
		<a href="#hidden" class="btn" data-method="value" data-params='["Junior"]'>Set Value: 'Junior'</a>
		<a href="#hidden" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>TextBox</em>
		<?php
		$ui = new TextBox('textbox');
		$ui->setMask(Mask::TimeShort);
		$ui->render();
		?>
		<br clear="all">
		<a href="#textbox" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#textbox" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#textbox" class="btn" data-method="value" data-params='["24:00"]'>Set Value: '24:00'</a>
		<a href="#textbox" class="btn" data-method="value" data-params='["10:00"]'>Set Value: '10:00'</a>
		<a href="#textbox" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>Embed</em>
		<?php
		$ui = new Embed(new TextBox('embed'));
		$ui->append(new Button('Ok'));
		$ui->render();
		?>
		<br clear="all">
		<a href="#embed" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#embed" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#embed" class="btn" data-method="value" data-params='["24:00"]'>Set Value: '24:00'</a>
		<a href="#embed" class="btn" data-method="value" data-params='["10:00"]'>Set Value: '10:00'</a>
		<a href="#embed" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>TypeHead</em>
		<?php
		$ui = new TextBox('typehead');
		$ui->setSuggestion(new TypeHead(array('Guilherme', 'Iduardo Junior', 'Mirian', 'Iduardo', 'Maria Aldete', 'Rafael', 'Anízia', 'Geraldo', 'Maria Cipriana', 'Pedro', 'Maria', 'Joaquim')));
		$ui->render();
		?>
		<br clear="all">
		<a href="#typehead" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#typehead" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#typehead" class="btn" data-method="value" data-params='["Guilherme"]'>Set Value: 'Guilherme'</a>
		<a href="#typehead" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>Suggest</em>
		<?php
		$ui = new TextBox('suggest');
		$ui->setSuggestion(new Suggest(new Action('Suggest')));
		$ui->render();
		?>
		<br clear="all">
		<a href="#suggest" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#suggest" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#suggest" class="btn" data-method="value" data-params='["Guilherme"]'>Set Value: 'Guilherme'</a>
		<a href="#suggest" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>Password</em>
		<?php
		$ui = new PasswordBox('password');
		$ui->render();
		?>
		<br clear="all">
		<a href="#password" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#password" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#password" class="btn" data-method="value" data-params='[4321]'>Set Value: '4321'</a>
		<a href="#password" class="btn" data-method="value" data-params='[123456]'>Set Value: '123456'</a>
		<a href="#password" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>NumberBox</em>
		<?php
		$ui = new NumberBox('money', new Number(new MoneyFormat(2, ',', '.', 'R$ '), ''));
		$ui->render();
		?>
		<br clear="all">
		<a href="#money" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#money" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#money" class="btn" data-method="value" data-params='["R$ 1.389,32"]'>Set Value: 'R$ 1.389,32'</a>
		<a href="#money" class="btn" data-method="value" data-params='[0.78]'>Set Value: '0.78'</a>
		<a href="#money" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>TextArea</em>
		<?php
		$ui = new TextArea('text');
		$ui->setRows(5);
		$ui->setPlaceholder('Informe uma mensagem');
		$ui->render();
		?>
		<br clear="all">
		<a href="#text" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#text" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#text" class="btn" data-method="value" data-params='["Guilherme"]'>Set Value: 'Guilherme'</a>
		<a href="#text" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>FileBox</em>
		<?php
		$ui = new FileBox('file');
		$ui->render();
		?>
		<br clear="all">
		<a href="#file" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#file" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#file" class="btn" data-method="value" data-params='["Guilherme"]'>Set Value: 'Guilherme'</a>
		<a href="#file" class="btn" data-method="value" data-params='[null]'>Set Value: 'null'</a>
		<a href="#file" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>RichText Standard</em>
		<?php
		$ui = new RichText('textstandard');
		$ui->setType(RichText::Standard);
		$ui->setRows(5);
		$ui->setSpan(9);
		$ui->render();
		?>
		<br clear="all">
		<a href="#textstandard" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#textstandard" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#textstandard" class="btn" data-method="value" data-params='["Guilherme"]'>Set Value: 'Guilherme'</a>
		<a href="#textstandard" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>RichText Advanced</em>
		<?php
		$ui = new RichText('textadvanced');
		$ui->setType(RichText::Advanced);
		$ui->setSpan(9);
		$ui->setRows(15);
		$ui->render();
		?>
		<br clear="all">
		<a href="#textadvanced" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#textadvanced" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#textadvanced" class="btn" data-method="value" data-params='["Guilherme"]'>Set Value: 'Guilherme'</a>
		<a href="#textadvanced" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>CheckBox</em>
		<?php
		$ui = new CheckBox('checkbox', 'Option one is this and that—be sure to include why it\'s great ');
		$ui->render();
		?>
		<br clear="all">
		<a href="#checkbox" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#checkbox" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#checkbox" class="btn" data-method="value" data-params='[1]'>Set Value: 'true'</a>
		<a href="#checkbox" class="btn" data-method="value" data-params='[0]'>Set Value: 'false'</a>
		<a href="#checkbox" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>CheckBoxList</em>
		<?php
		$ui = new CheckBoxList('checkgroup', true);
		$ui->addOption(1, 'Um');
		$ui->addOption(2, 'Dois');
		$ui->addOption(3, 'Três');
		$ui->addOption(4, 'Quatro');
		$ui->addOption(5, 'Cinco');
		$ui->render();
		?>
		<br clear="all">
		<a href="#checkgroup" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#checkgroup" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#checkgroup" class="btn" data-method="value" data-params='[null]'>Set Value: 'null'</a>
		<a href="#checkgroup" class="btn" data-method="value" data-params='[1]'>Set Value: '1'</a>
		<a href="#checkgroup" class="btn" data-method="value" data-params='[[1,2]]'>Set Value: '1,2'</a>
		<a href="#checkgroup" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>RadioButton</em>
		<?php
		$ui = new RadioButton('radio', 'Option one is this and that—be sure to include why it\'s great');
		$ui->render();
		?>
		<br clear="all">
		<a href="#radio" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#radio" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#radio" class="btn" data-method="value" data-params='[1]'>Set Value: 'true'</a>
		<a href="#radio" class="btn" data-method="value" data-params='[0]'>Set Value: 'false'</a>
		<a href="#radio" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>RadioButtonList</em>
		<?php
		$ui = new RadioButtonList('radiogroup', true);
		$ui->addOption(1, 'Um');
		$ui->addOption(2, 'Dois');
		$ui->addOption(3, 'Três');
		$ui->addOption(4, 'Quatro');
		$ui->addOption(5, 'Cinco');
		$ui->render();
		?>
		<br clear="all">
		<a href="#radiogroup" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#radiogroup" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#radiogroup" class="btn" data-method="value" data-params='[null]'>Set Value: 'null'</a>
		<a href="#radiogroup" class="btn" data-method="value" data-params='[1]'>Set Value: '1'</a>
		<a href="#radiogroup" class="btn" data-method="value" data-params='[[1,2]]'>Set Value: '1,2'</a>
		<a href="#radiogroup" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>ComboBox</em>
		<?php
		$ui = new ComboBox('combobox');
		$ui->addOption(1, 'Um');
		$ui->addOption(2, 'Dois');
		$ui->addOption(3, 'Três');
		$ui->addOption(4, 'Quatro');
		$ui->addOption(5, 'Cinco');
		$ui->setValue(3);
		$ui->render();
		?>
		<br clear="all">
		<a href="#combobox" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#combobox" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#combobox" class="btn" data-method="value" data-params='[null]'>Set Value: 'null'</a>
		<a href="#combobox" class="btn" data-method="value" data-params='[1]'>Set Value: '1'</a>
		<a href="#combobox" class="btn" data-method="value" data-params='[2]'>Set Value: '2'</a>
		<a href="#combobox" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>ListBox</em>
		<?php
		$ui = new ListBox('listbox');
		$ui->addOption(1, 'Um');
		$ui->addOption(2, 'Dois');
		$ui->addOption(3, 'Três');
		$ui->addOption(4, 'Quatro');
		$ui->addOption(5, 'Cinco');
		$ui->setValue(3);
		$ui->render();
		?>
		<br clear="all">
		<a href="#listbox" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#listbox" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#listbox" class="btn" data-method="value" data-params='[null]'>Set Value: 'null'</a>
		<a href="#listbox" class="btn" data-method="value" data-params='[1]'>Set Value: '1'</a>
		<a href="#listbox" class="btn" data-method="value" data-params='[[1,2]]'>Set Value: '1,2'</a>
		<a href="#listbox" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>ChosenBox (single)</em>
		<?php
		$ui = new ChosenBox('chosenbox-single');
		$ui->setPlaceholder('Selecione uma opção');
		$ui->addOption('', '');
		$ui->addOption(1, 'Um');
		$ui->addOption(2, 'Dois');
		$ui->addOption(3, 'Três');
		$ui->addOption(4, 'Quatro');
		$ui->addOption(5, 'Cinco');
		$ui->render();
		?>
		<br clear="all">
		<br clear="all">
		<a href="#chosenbox-single" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#chosenbox-single" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#chosenbox-single" class="btn" data-method="value" data-params='[null]'>Set Value: 'null'</a>
		<a href="#chosenbox-single" class="btn" data-method="value" data-params='[1]'>Set Value: '1'</a>
		<a href="#chosenbox-single" class="btn" data-method="value" data-params='[2]'>Set Value: '2'</a>
		<a href="#chosenbox-single" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>ChosenBox (multiple)</em>
		<?php
		$ui->setName('chosenbox-multiple');
		$ui->removeOption('');
		$ui->setMultiple(true);
		$ui->render();
		?>
		<br clear="all">
		<br clear="all">
		<a href="#chosenbox-multiple" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#chosenbox-multiple" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#chosenbox-multiple" class="btn" data-method="value" data-params='[null]'>Set Value: 'null'</a>
		<a href="#chosenbox-multiple" class="btn" data-method="value" data-params='[1]'>Set Value: '1'</a>
		<a href="#chosenbox-multiple" class="btn" data-method="value" data-params='[[1,2]]'>Set Value: '1,2'</a>
		<a href="#chosenbox-multiple" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>XComboBox</em>
		<?php
		$ui = new XComboBox('xcombobox');
		$ui->setPlaceholder('Selecione uma opção');
		$ui->addOption(1, 'Um');
		$ui->addOption(2, 'Dois');
		$ui->addOption(3, 'Três');
		$ui->addOption(4, 'Quatro');
		$ui->addOption(5, 'Cinco');
		$ui->setValue(4);
		$ui->render();
		?>
		<br clear="all">
		<a href="#xcombobox" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#xcombobox" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#xcombobox" class="btn" data-method="value" data-params='[null]'>Set Value: 'null'</a>
		<a href="#xcombobox" class="btn" data-method="value" data-params='[1]'>Set Value: '1'</a>
		<a href="#xcombobox" class="btn" data-method="value" data-params='[2]'>Set Value: '2'</a>
		<a href="#xcombobox" class="btn" data-method="value">Get Value</a>
	</div>
	<div class="block">
		<em>XFileBox</em>
		<?php
		$ui = new XFileBox('xfile');
		$ui->setPlaceholder('Selecione uma opção');
		$ui->render();
		?>
		<br clear="all">
		<a href="#xfile" class="btn" data-method="disabled" data-params='[1]'>Disable</a>
		<a href="#xfile" class="btn" data-method="disabled" data-params='[0]'>Enable</a>
		<a href="#xfile" class="btn" data-method="value" data-params='[null]'>Set Value: 'null'</a>
		<a href="#xfile" class="btn" data-method="value" data-params='[1]'>Set Value: '1'</a>
		<a href="#xfile" class="btn" data-method="value" data-params='[2]'>Set Value: '2'</a>
		<a href="#xfile" class="btn" data-method="value">Get Value</a>
	</div>
	<script type="text/javascript">
	$(function() {
		$.fn.datepicker.defaults.language = 'pt-BR';
		$('[data-method]').click(function(){
			var $this = $(this),
				target = $($this.attr('href')).field(),
				method = $this.data('method'),
				params = $this.data('params'),
				object = target.data('field'), 
				response;
			
			response = object[method].apply(object, params);
			if ( response !== undefined ) {
				alert(response);
			}
			return false;
		});
		$.fck.path =  'vendor/fckeditor/';
	});
	</script>
</fieldset>