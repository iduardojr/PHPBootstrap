<?php
namespace PHPBootstrap\Mvc\View;

use PHPBootstrap\Mvc\Http\HttpResponse;
use PHPBootstrap\Widget\Widget;

/**
 * Visão
 */
class View implements Viewable {

	/**
	 * Layout
	 *
	 * @var string
	 */
	protected $layout;

	/**
	 * Template
	 *
	 * @var string
	 */
	protected $template;

	/**
	 * Variaveis
	 *
	 * @var array
	 */
	protected $vars = array();

	/**
	 * Construtor
	 */
	public function __construct() {
	}

	/**
	 * Obtem o layout
	 *
	 * @return string
	 */
	public function getLayout() {
		return $this->layout;
	}

	/**
	 * Atribui o layout
	 *
	 * @param string $layout
	 */
	public function setLayout( $layout ) {
		$this->layout = $layout;
	}

	/**
	 * Obtem o template
	 *
	 * @return string
	 */
	public function getTemplate() {
		return $this->template;
	}

	/**
	 * Atribui o template
	 *
	 * @param string $template
	 */
	public function setTemplate( $template ) {
		$this->template = $template;
	}

	/**
	 * Atribui variavel
	 *
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set( $name, $value ) {
		if ( is_null($value) ) {
			unset($this->vars[$name]);
		} else {
			$this->vars[$name] = $value;
		}
	}

	/**
	 * Obtem variavel
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function __get( $name ) {
		return isset($this->vars[$name]) ? $this->vars[$name] : null;
	}

	/**
	 *
	 * @see Viewable::accept()
	 */
	public function accept( HttpResponse $response ) {
		$response->setHeader('Content-Type', 'text/html');
	}

	/**
	 * Renderiza a visão
	 *
	 * @return string
	 */
	public function render() {
		$render = '';
		if ( ! empty($this->template) ) {
			$render = $this->getFileContents($this->template);
		} else {
			ob_start();
			foreach ( $this->vars as $var => $value ) {
				if ( ! preg_match('/__\w+__/', $var) ) {
					if ( $var instanceof Widget ) {
						$var->render();
					} else {
						echo ( string ) $var;
					}
				}
			}
			$render .= ob_get_contents();
			ob_end_clean();
		}
		if ( $this->layout ) {
			$this->__CONTENT__ = $render;
			$render = $this->getFileContents($this->layout);
		}
		return $render;
	}

	/**
	 *
	 * @see Viewable::__toString()
	 */
	public function __toString() {
		return $this->render();
	}

	/**
	 * Obtem a string do arquivo
	 *
	 * @param string $filename
	 * @return string
	 */
	private function getFileContents( $filename ) {
		$str = '';
		ob_start();
		include ( $filename );
		$str = ob_get_contents();
		ob_end_clean();
		return $str;
	}

}
?>