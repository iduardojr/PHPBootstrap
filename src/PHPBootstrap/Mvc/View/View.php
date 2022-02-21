<?php
namespace PHPBootstrap\Mvc\View;

use PHPBootstrap\Mvc\Http\HttpResponse;
use PHPBootstrap\Widget\Renderable;

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
	 * Conteudo
	 *
	 * @var mixed
	 */
	protected $content;

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
	 * Obtem o conteudo
	 *
	 * @return mixed
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Atribui o conteudo
	 *
	 * @param mixed $content
	 * @throws \InvalidArgumentException
	 */
	public function setContent( $content ) {
		$contents = ! is_array($content) ? array($content) : $content;
		foreach ( $contents as $item ) {
			if ( !( is_scalar($item) || 
					is_null($item) || 
					is_callable(array(&$item, '__toString')) ||
					$item instanceof Renderable) ){
				throw new \InvalidArgumentException('content must be a string or object implementing __toString() or instance of PHPBootstrap\Widget\Renderable');	
			}
		}
		$this->content = $content;
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
		$contents = ! is_array($this->content) ? array($this->content) : $this->content; 
		foreach( $contents as $key => $content ) {
			if ( is_string($content) && $this->fileExist($content) ) {
				$contents[$key] = $this->getFileContents($this->content);
			} elseif ( $content instanceof Renderable ) {
				ob_start();
				$content->render();
				$contents[$key] = ob_get_contents();
				ob_end_clean();
			}
		}  
		$contents = implode("\n", $contents);
		if ( $this->layout ) {
			$this->__CONTENT__ = $contents;
			$contents = $this->getFileContents($this->layout);
		}
		return $contents;
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
	
	/**
	 * Verifica se um arquivo existe
	 * 
	 * @param string $filename
	 * @return boolean
	 */
	public function fileExist( $filename ) {
		$paths = explode(PATH_SEPARATOR, get_include_path());
		foreach( $paths as $path ) {
			if ( file_exists( rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $filename) ) {
				return true;
			}
		}
		return false;
	}

}
?>