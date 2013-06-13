<?php 
use PHPBootstrap\Widget\Form\TgFormClear;
use PHPBootstrap\Widget\Form\TgFormReset;
use PHPBootstrap\Widget\Form\TgFormSubmit;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\TextBox;
use PHPBootstrap\Validate\Required\Required;
use PHPBootstrap\Widget\Action\TgAjax;
use PHPBootstrap\Widget\Layout\Panel;
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Form\Controls\ControlGroup;
use PHPBootstrap\Widget\Form\Controls\Label;
use PHPBootstrap\Widget\Form\Controls\CheckBox;
use PHPBootstrap\Widget\Form\Controls\DateBox;
use PHPBootstrap\Validate\Pattern\Date;
use PHPBootstrap\Format\DateFormat;
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>Form</em>
		<?php
		$form = new Form('user');
		$form->setStyle(Form::Horizontal);
		
		$id = new TextBox('id');
		$id->setDisabled(true);
		$id->setSpan(3);
		
		$firstname = new TextBox('firstname');
		$firstname->setPlaceholder('First Name');
		$firstname->setSpan(3);
		$firstname->setRequired(new Required(), 'Please enter First Name');
		
		$lastname = new TextBox('lastname');
		$lastname->setPlaceholder('Last Name');
		$lastname->setSpan(3);
		$lastname->setRequired(new Required(), 'Please enter Last Name');
		
		$birthday = new DateBox('birthday', new Date(new DateFormat('dd/mm/yyyy')));
		$birthday->setPlaceholder('dd/mm/yyyy');
		$birthday->setSpan(3);
		$birthday->setRequired(new Required(), 'Please enter Birthday');
		
		$active = new CheckBox('status', 'Ativo');
		
		$form->append(new Panel('', 'alertbox'));
		$form->append(new ControlGroup(new Label('ID'), $id));
		$form->register($id);
		$form->append(new ControlGroup(new Label('Name'), array($firstname, $lastname)));
		$form->register($firstname);
		$form->register($lastname);
		$form->append(new ControlGroup(new Label('Birthday'), $birthday));
		$form->register($birthday);
		$form->append(new ControlGroup(null, $active));
		$form->register($active);
		$form->addButton(new Button('Submit', new TgFormSubmit(new Action('Form', 'submit'), $form), Button::Primary));
		$form->addButton(new Button('Reset', new TgFormReset($form)));
		$form->addButton(new Button('Clear', new TgFormClear($form)));
		$form->addButton(new Button('Load', new TgAjax(new Action('Form', 'load'), $form, TgAjax::Json)));
		$form->setData(array('status' => true));
		$form->render();
		?>
	</div>
	<script type="text/javascript">
	$(function(){
		$('[target=user]').on('loadingaction', function(){
			$('#id').addClass('loading');
			$('#user > form').form('elements')
		  	   				 .closest('.control-group')
		  	   				 .removeClass('error')
		  	   				 .find('.validate')
		  	   				 .remove();
			$('#firstname, #lastname, #birthday, #status').field('disabled', true);
		});
		$('[target=user]').on('loadedaction', function(){
			$('#id').removeClass('loading');
			$('#firstname, #lastname, #birthday, #status').field('disabled', false);
		});
		$('#user > form').form({ajax:true});
		$('#user > form').on('successform', function( e, data ){
			$(e.currentTarget).form('reset');
		});
		$('#user > form').on('successform', function( e, data ){
			$('#alertbox').html(data);
			$(e.currentTarget).form('reset');
		});
		$('#user > form').on('errorform', function( e, data ){
			$.each(data.list, function (i, error) {
				var group = $(error.element).closest('.control-group');
				group.find('.validate')
					 .remove(); 
				group.addClass('error')
					 .find('.controls')
					 .append('<span class="validate help-inline">' + error.message + '</span>');
			});
		});
		$('#user > form').on('validform', function( e, data ){
			$.each(data.list, function (i, valid) {
				var group = $(valid).closest('.control-group'); 
				group.removeClass('error')
					 .find('.validate')
					 .remove();
			});
		});
	});
	</script>
</fieldset>