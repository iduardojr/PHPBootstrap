<?php
namespace src\PHPBootstrap\Mvc\View;

use PHPBootstrap\Mvc\Http\HttpResponse;
use PHPBootstrap\Mvc\View\Viewable;

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
	 * Construtor
	 * 
	 * @param array $values
	 */
	public function __construct( array $values = array() ) {
		$this->values = $values;
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
			if ( is_string($value) ) {
				$data[$key] = utf8_encode($data);
			} elseif ( is_array($value)) {
				$data[$key] = $this->encode($value);
			}
		}
		return $data;
	}}