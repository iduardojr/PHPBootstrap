<?php 
use PHPBootstrap\Widget\Tab\Tabbable;
use PHPBootstrap\Widget\Table\DataSource;
use PHPBootstrap\Widget\Slide\Slide;
use PHPBootstrap\Widget\Containable;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Collapse\Collapsible;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputContext;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputPicker;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputQuery;

class MockEntry implements InputQuery, InputPicker, InputContext {
	public $value;
	public $name;
	public function __construct($value = 'Iduardo Junior', $name = 'entry'){
		$this->name = $name;
		$this->value = $value;
	}
	public function prepare( Form $form ) {}
	public function setValue( $value ) {}
	public function getValue() {}
	public function valid() {}
	public function getFailMessages() {}
	public function getName() { return $this->name; }
	public function setName( $name ) {}
	public function setParent( Containable $parent = null ) {}
	public function getParent() {}
	public function render() {}
	public function getRendererType() {}
	public function getContextIdentify() { return '#' . $this->getName(); }
	public function getContextValue() { return $this->value; }
}

class MockCollapse implements Collapsible {
	public $parent;
	public function __construct( $parent = null ) { $this->parent = $parent; }
	public function getIdentify() { return 'collapse';}
	public function getName() {}
	public function setName( $name ) {}
	public function setParent( Containable $parent = null ) {}
	public function getParent() { return $this->parent; }
	public function render() {}
	public function getRendererType() {	}
}
class MockCollapseContainer implements \PHPBootstrap\Widget\Collapse\Containable {
	public function getName() { return 'container'; }
	public function setName( $name ) {}
	public function setParent( Containable $parent = null ) {}
	public function getParent() {}
	public function render() {}
	public function getRendererType() {	}
}
class MockSlide implements Slide {
	public function getIdentify() { return 'slide'; }
}
class MockDS implements DataSource {
	public $total;
	public $limit;
	public $offset;
	public $count;
	public $sort;
	public $order;
	public function __construct( $total, $limit, $offset, $sort = 'name', $order = self::Desc ) {
		$this->total = $total;
		$this->limit = $limit;
		$this->offset = $this->count = $offset;
		$this->sort = $sort;
		$this->order = $order;
	}
	public function getIdentify() { return 'id'; }
	public function getTotal() { return $this->total; }
	public function getSort() { return $this->sort; }
	public function getOrder() { return $this->order; }
	public function getLimit() { return $this->limit; }
	public function fetch() { return array('id' => $this->count, 'name' => 'Iduardo Donizet Gomes Junior', 'birthday' => '1985-10-06', 'status' => (bool) ( $this->count % 2 )); }
	public function getOffset() { return $this->offset; }
	public function next() { $this->count++; return $this->count <= min($this->offset + $this->limit, $this->total); }
	public function __get( $name ) { $data = $this->fetch(); return isset($data[$name]) ? $data[$name] : null;	}
	public function reset() {}
}
class MockTab implements Tabbable {
	public function getIdentify() { return 'tabbable';}
	public function getRendererType() { }
}
?>