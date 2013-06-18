<?php
use PHPBootstrap\Widget\Pagination\PagerBar;
use PHPBootstrap\Widget\Table\TablePagination;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Widget\Table\ColumnAction;
use PHPBootstrap\Widget\Table\ColumnText;
use PHPBootstrap\Widget\Table\ColumnSelect;
use PHPBootstrap\Widget\Table\Table;
use PHPBootstrap\Widget\Action\TgAjax;
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Pagination\Paginator;
require_once 'tests/mocks.php';

$datasource = new MockDS(45, 10, 0);
$table = new Table('table', $datasource);
$paginator = new TablePagination(new PagerBar(new TgAjax(new Action('Table', 'page'), $table), new Paginator(45, 10)));

$table->setStyle(Table::Striped);
$table->setContextRow(function ( $data ) { 
	switch ( $data['id'] ) {
		case 01:
			return Table::Error;
			break;
			
		case 11:
			return Table::Info;
			break;
		
		case 21:
			return Table::Success;
			break;
			
		case 31:
			return Table::Warning;
			break;
		
	}
});


$column = new ColumnSelect('key');
$column->setContextEnabled(function( $data ) {
	return $data['status'];
});
$table->addColumn($column);

$column = new ColumnText('id', '#');
$column->setToggle(new TgAjax(new Action('Table', 'id'), $table));
$column->setFilter( function( $value ) {
	return str_repeat('0', 3 - strlen($value)) . $value;
});
$table->addColumn($column);

$column = new ColumnText('name', 'Nome');
$column->setAlign(ColumnText::Left);
$column->setToggle(new TgAjax(new Action('Table', 'name'), $table));
$table->addColumn($column);

$column = new ColumnText('birthday', 'Data de Aniversário');
$column->setToggle(new TgAjax(new Action('Table', 'birthday'), $table));
$column->setFilter( function( $value ) {
	return implode('/', array_reverse(explode('-', $value)));
});
$table->addColumn($column);

$column = new ColumnText('status', 'Status');
$column->setToggle(new TgAjax(new Action('Table', 'status'), $table));
$column->setFilter( function( $value ) {
	return $value ? 'Ativo' : 'Inativo';
});
$table->addColumn($column);

$column = new ColumnAction('edit', new Icon('icon-pencil'), new TgAjax(new Action('Table', 'edit'), $table));
$column->setTooltip(new Tooltip('Edit'));
$table->addColumn($column);

$column = new ColumnAction('exclude', new Icon('icon-remove'), new TgAjax(new Action('Table', 'exclude'), $table));
$column->setTooltip(new Tooltip('Exclude'));
$table->addColumn($column);

$paginator->setLimits(new TgAjax(new Action('Table', 'limit'), $table), 10, 15, 20, 25);
$table->setPagination($paginator);

if ( isset($_GET['method']) ){
	switch ( $_GET['method'] ){
		case 'id':
		case 'name':
		case 'birthday':
		case 'status':
			if ( $datasource->sort == $_GET['method'] ) {
				$datasource->order = $datasource->order == MockDS::Asc ? MockDS::Desc : MockDS::Asc;
			} else {
				$datasource->order = MockDS::Desc;
				$datasource->sort = $_GET['method'];
			}
			break;

		case 'exclude':
			$datasource->total--;
			break;

		case 'page':
			switch ( $_GET['page'] ) {
				case 'next': 
					$_GET['page'] = 2;
					break;
				
				case 'last': 
					$_GET['page'] = 5;
					break;
					
				case 'first': 
				case 'prev': 
					$_GET['page'] = 1;
					break;
				 
			}
			$datasource->offset = $datasource->count = ( $_GET['page'] - 1 ) * $datasource->limit;
			break;

		case 'limit':
			$datasource->limit = (int) $_GET['limit'];
			break;
	}
}

$table->render();
?>