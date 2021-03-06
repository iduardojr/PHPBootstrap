<?php
namespace PHPBootstrap\Mvc\View;

use PHPBootstrap\Mvc\Http\HttpResponse;
use PHPBootstrap\Mvc\View\Viewable;
use PHPBootstrap\Widget\Renderable;

/**
 * Visualização de um json
 */
class JsonView implements Viewable {

	/**
	 * Valores
	 *
	 * @var array
	 */
	protected $values;
	
	/**
	 * Codificar em UTF-8
	 * 
	 * @var boolean
	 */
	protected $utf8;
	
	/**
	 * Construtor
	 * 
	 * @param array $values
	 * @param boolean $utf8
	 */
	public function __construct( array $values = array(), $utf8 = true ) {
		$this->values = $values;
		$this->utf8 = $utf8;
	}

	/**
	 * Atribui variavel
	 *
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set( $name, $value ) {
		if ( is_null($value) ) {
			unset($this->values[$name]);
		} else {
			$this->values[$name] = $value;
		}
	}

	/**
	 * Obtem variavel
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function __get( $name ) {
		return isset($this->values[$name]) ? $this->values[$name] : null;
	}
	
	/**
	 * Renderiza o objeto
	 *
	 * @return string
	 */
	public function render() {
		return json_encode($this->encode($this->values));
	}

	/**
	 *
	 * @see Viewable::accept()
	 */
	public function accept( HttpResponse $response ) {
		$response->setHeader('Content-Type', 'application/json');
	}

	/**
	 *
	 * @see Viewable::__toString()
	 */
	public function __toString() {
		return $this->render();
	}

	/**
	 * Codifica os valores
	 * 
	 * @param array $data
	 */
	private function encode( array $data ) {
		foreach ( $data as $key => $value ) {
			if ( is_scalar($value) || is_callable(array(&$value, '__toString')) ) {
				$data[$key] = ( string ) $this->utf8 ? utf8_encode($value) : $value;
			} elseif ( is_array($value)) {
				$data[$key] = $this->encode($value);
			} elseif ( $value instanceof Renderable ) {
				ob_start();
				$value->render();
				$data[$key] = $this->utf8 ? utf8_encode(ob_get_contents()) : ob_get_contents();
				ob_end_clean();
			} 
		}
		return $data;
	}}