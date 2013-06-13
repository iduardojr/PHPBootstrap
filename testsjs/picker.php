<?php 
use PHPBootstrap\Widget\Colorpicker\ColorSuggest;
use PHPBootstrap\Widget\Colorpicker\TgColorPicker;
use PHPBootstrap\Widget\Timepicker\TimeSuggest;
use PHPBootstrap\Widget\Timepicker\TgTimePicker;
use PHPBootstrap\Widget\Datepicker\DatePicker;
use PHPBootstrap\Widget\Datepicker\DateSuggest;
use PHPBootstrap\Widget\Datepicker\TgDatePicker;
use PHPBootstrap\Widget\Form\Controls\TextBox;
use PHPBootstrap\Widget\Form\Controls\ColorBox;
use PHPBootstrap\Widget\Form\Controls\TimeBox;
use PHPBootstrap\Widget\Form\Controls\DateBox;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Format\DateFormat;
use PHPBootstrap\Format\TimeFormat;
use PHPBootstrap\Format\ColorFormat;
use PHPBootstrap\Validate\Pattern\Date;
use PHPBootstrap\Validate\Pattern\Time;
use PHPBootstrap\Validate\Pattern\Color;
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>Date Picker</em>
		<?php
		$ui = new DatePicker(new DateFormat('dd/mm/yyyy'));
		$ui->setDefaultValue('01/01/2012');
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Toggle Date Picker</em>
		<?php
		$ui = new Button('Change Date', new TgDatePicker(new DateFormat('dd/mm/yyyy')));
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Date Suggest</em>
		<?php
		$ui = new TextBox('datesuggest');
		$ui->setSuggestion(new DateSuggest(new DateFormat('dd/mm/yyyy')));
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Date Box</em>
		<?php
		$ui = new DateBox('datebox', new Date(new DateFormat('dd/mm/yyyy'), 'data invalida'));
		$ui->setValue('06/10/1985');
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Toggle Time Picker</em>
		<?php
		$ui = new Button('Change Time', new TgTimePicker(new TimeFormat('hh:mm')));
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Time Suggest</em>
		<?php
		$ui = new TextBox('timesuggest');
		$ui->setSuggestion(new TimeSuggest(new TimeFormat('hh:mm')));
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Time Box</em>
		<?php
		$ui = new TimeBox('timebox', new Time(new TimeFormat('hh:mm'), 'hora invalida'));
		$ui->setValue('11:00');
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Toggle Color Picker</em>
		<?php
		$ui = new Button('Change Color', new TgColorPicker(ColorFormat::HEX));
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Color Suggest</em>
		<?php
		$ui = new TextBox('colorsuggest');
		$ui->setSuggestion(new ColorSuggest(ColorFormat::HEX));
		$ui->render();
		?>
	</div>
	<div class="block">
		<em>Color Box</em>
		<?php
		$ui = new ColorBox('colorbox', new Color(ColorFormat::HEX, 'Formato invalido'));
		$ui->setValue('#ececec');
		$ui->render();
		?>
	</div>
	<script type="text/javascript">
	$(function() {
		$.fn.datepicker.defaults.language = 'pt-BR';
		$('[data-params]').click(function(){
			$($(this).attr('href')).field('disabled', $(this).data('params'));
			return false;
		});
	});
	</script>
</fieldset>