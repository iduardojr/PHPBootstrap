<?php 
use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Widget\Modal\Modal;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Widget\Table\ColumnAction;
use PHPBootstrap\Widget\Table\ColumnText;
use PHPBootstrap\Widget\Table\Table;
use PHPBootstrap\Widget\Layout\Box;
use PHPBootstrap\Common\ClassLoader;
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\QueryString;
use PHPBootstrap\Widget\Form\Controls\ResearchBox;
use PHPBootstrap\Widget\Action\TgAjax;
use PHPBootstrap\Widget\Misc\Alert;

require_once('src/PHPBootstrap/Common/ClassLoader.php');
ClassLoader::setIncludePaths(array('D:/Trabalhos/WampServer/www/PHPBootstrap/src/', 
								   'D:/Trabalhos/WampServer/www/PHPBootstrap/tests/'));


$loader = new ClassLoader();
$loader->registerAutoLoad();
if ( isset($_GET['json']) ) {
	echo json_encode(array('name' => 'Iduardo Donizet Gomes Junior'));
	exit;
}
Action::setRouter(new QueryString());
require_once('mocks.php');

if ( isset($_GET['class']) ) {
	
	sleep(1);
	
	switch ( $_GET['class'] ) {
		
		case 'Modal':
			echo '
			<div>
              <h4>Text in a modal</h4>
              <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem.</p>

              <h4>Popover in a modal</h4>
              <p>This <a data-content="And here\'s some amazing content. It\'s very engaging. right?" class="btn popover-test" role="button" href="#" data-original-title="A Title">button</a> should trigger a popover on click.</p>

              <h4>Tooltips in a modal</h4>
              <p><a class="tooltip-test" href="#" data-original-title="Tooltip">This link</a> and <a class="tooltip-test" href="#" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>

              <hr>

              <h4>Overflowing text to show optional scrollbar</h4>
              <p>We set a fixed <code>max-height</code> on the <code>.modal-body</code>. Watch it overflow with all this extra lorem ipsum text we\'ve included.</p>
              <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
              <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
              <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
              <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
            </div>';
			exit;
			
		case 'Table':
			ob_start();
			require_once 'testsjs/require-table.php';
			$value = ob_get_contents();
			ob_end_clean();
			echo utf8_encode($value);
			exit;
			
		case 'Suggest':
			$data[] = array('label' => 'Iduardo Junior', 'value' => array('first_name' => 'Iduardo', 'last_name' => 'Junior', 'birthday' => '06/10/1985'));
			$data[] = array('label' => 'Mirian Brito', 'value' => array('first_name' => 'Mirian', 'last_name' => 'Brito', 'birthday' => '05/03/1976'));
			$data[] = array('label' => 'Guilherme Brito', 'value' => array('first_name' => 'Guilherme', 'last_name' => 'Brito', 'birthday' => '11/07/2011'));
			$data[] = array('label' => 'Davi do Carmo', 'value' => array('first_name' => 'Davi', 'last_name' => 'do Carmo', 'birthday' => '08/01/1972'));
			$data[] = array('label' => 'Maria Aldete', 'value' => array('first_name' => 'Maria', 'last_name' => 'Aldete', 'birthday' => '26/07/1962'));
			$data[] = array('label' => 'Iduardo Gomes', 'value' => array('first_name' => 'Iduardo', 'last_name' => 'Gomes', 'birthday' => '17/06/1961'));
			echo json_encode($data);
			exit;
			
		case 'Seek':
			$key = isset($_GET['key']) ? $_GET['key'] : 1;
			echo json_encode(array('id' => '00' . $key, 'name' => 'Iduardo Donizet Gomes Junior', 'birthday' => '06/10/1985', 'status' => $key % 2 ));
			exit;
			
		case 'Research':
			$box = new Box();
			
			$input = new ResearchBox('query', new Action('Research'), new Modal('output', new Title('')));
			$input->setValue(isset($_GET['query']) ? $_GET['query'] : null);
			$box->append($input);
			
			$table = new Table('result', new MockDS(7, 10, 0));
			$column = new ColumnText('id', '#');
			$column->setFilter( function( $value ) {
				return str_repeat('0', 3 - strlen($value)) . $value;
			});
			$table->addColumn($column);
			
			$column = new ColumnText('name', 'Nome');
			$column->setAlign(ColumnText::Left);
			$table->addColumn($column);
			
			$column = new ColumnText('birthday', 'Data de Aniversário');
			$column->setFilter( function( $value ) {
				return implode('/', array_reverse(explode('-', $value)));
			});
			$table->addColumn($column);
			
			$column = new ColumnText('status', 'Status');
			$column->setFilter( function( $value ) {
				return $value ? 'Ativo' : 'Inativo';
			});
			$table->addColumn($column);
			
			$action = new TgAjax(new Action('Seek'), 'box-person');
			$action->setResponse(TgAjax::Json);
			$column = new ColumnAction('choise', new Icon('icon-ok'), $action);
			$table->addColumn($column);
			$box->append($table);
			
			ob_start();
			$box->render();
			$value = ob_get_contents();
			ob_end_clean();
			echo utf8_encode($value);
			exit;
			
		case 'Form': 
			switch ( $_GET['method'] ) {
				case 'submit':
					$alert = new Alert('Successfully submit data in form.', Alert::Success);
					$alert->render();
					break;
				
				case 'load':
					echo json_encode(array('id' => '001', 'firstname' => 'Iduardo', 'lastname' => 'Junior', 'birthday' => '06/10/1985', 'status' => true ));
					break;
			}
			exit;
	} 
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title><?php echo $_GET['w']; ?></title>
	<link rel="stylesheet" href="vendor/bootstrap/bootstrap-2.3.2.css" type="text/css" media="all" />
	<link rel="stylesheet" href="vendor/bootstrap-datepicker/bootstrap-datepicker.css" type="text/css" media="all" />
	<link rel="stylesheet" href="vendor/bootstrap-timepicker/bootstrap-timepicker-0.2.3.css" type="text/css" media="all" />
	<link rel="stylesheet" href="vendor/bootstrap-colorpicker/bootstrap-colorpicker.css" type="text/css" media="all" />
	<link rel="stylesheet" href="src/resources/phpbootstrap-min.css" type="text/css" media="all" />
	
	<style>
		body { padding: 50px; font-size: 12px;  }
		.block { margin-bottom: 15px; clear: both; }
		.block em { font-size: 15px; display:block; margin-bottom: 5px; }
		#box-person { background: #fff; width: 250px; position: fixed; right: 50px; }
	</style>
	<script type="text/javascript" src="vendor/fckeditor/fckeditor.js"></script>
	<script type="text/javascript" src="vendor/jquery-1.8.2.js"></script>
	<script type="text/javascript" src="vendor/jquery.ui-1.9.2.sortable.min.js"></script>
	<script type="text/javascript" src="vendor/jquery.cookie-1.3.1.js"></script>
	<script type="text/javascript" src="vendor/jquery.form-3.20.js"></script>
	<script type="text/javascript" src="vendor/jquery.validate-1.10.0.js"></script>
	<script type="text/javascript" src="vendor/jquery.validate-1.10.0.add.methods.js"></script>
	<script type="text/javascript" src="vendor/jquery.maskmoney-1.3.js"></script>
	<script type="text/javascript" src="vendor/jquery.maskedinput-1.3.js"></script>
	<script type="text/javascript" src="vendor/jquery.fckeditor-1.32.js"></script>
</head>
<body>
	<?php require_once('testsjs/' . $_GET['w'] . '.php'); ?>
	<script type="text/javascript" src="vendor/bootstrap/bootstrap-2.3.2.js"></script>
	<script type="text/javascript" src="vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="vendor/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.js"></script>
	<script type="text/javascript" src="vendor/bootstrap-timepicker/bootstrap-timepicker-0.2.3.js"></script>
	<script type="text/javascript" src="vendor/bootstrap-colorpicker/bootstrap-colorpicker.js"></script>
	<script type="text/javascript" src="src/resources/phpbootstrap-min.js"></script>
</body>
</html>