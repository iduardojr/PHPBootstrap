<?php
namespace PHPBootstrap\Render\Html5;

use PHPBootstrap\Render\Response;

/**
 * Nó Html
 */
class HtmlNode implements Response {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	protected $tagName;

	/**
	 * Atributos
	 *
	 * @var array
	 */
	protected $attributes = array();

	/**
	 * Nós Filhos
	 *
	 * @var array
	 */
	protected $nodes = array();

	/**
	 * Nó unico
	 *
	 * @var boolean
	 */
	protected $single;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param boolean $single
	 */
	function __construct( $name, $single = false ) {
		$this->setTagName($name);
		$this->setSingle($single);
	}

	/**
	 * Atribui no unico
	 *
	 * @param boolean $single
	 * @return HtmlNode
	 */
	public function setSingle( $single ) {
		$this->single = ( bool ) $single;
		return $this;
	}

	/**
	 * Atribui nome da tag
	 *
	 * @param string $name
	 * @return HtmlNode
	 */
	public function setTagName( $name ) {
		$this->tagName = strtolower($name);
		return $this;
	}

	/**
	 * Obtem nome da tag
	 *
	 * @return string
	 */
	public function getTagName() {
		return $this->tagName;
	}

	/**
	 * Atribui uma classe
	 *
	 * @param string $class
	 * @return HtmlNode
	 */
	public function addClass( $class ) {
		$class = ( string ) $class;
		$this->attributes['class'][$class] = $class;
		return $this;
	}

	/**
	 * Remove uma classe
	 *
	 * @param string $class
	 * @return HtmlNode
	 */
	public function removeClass( $class ) {
		if ( $this->hasAttribute('class') ) {
			unset($this->attributes['class'][$class]);
			if ( empty($this->attributes['class']) ) {
				unset($this->attributes['class']);
			}
		}
		return $this;
	}

	/**
	 * Verifica se uma classe existe
	 *
	 * @param string $class
	 * @return boolean
	 */
	public function hasClass( $class ) {
		return $this->hasAttribute('class') && isset($this->attributes['class'][$class]);
	}

	/**
	 * Atribui um estilo
	 *
	 * @param string $name
	 * @param string $value
	 * @return HtmlNode
	 */
	public function addStyle( $name, $value ) {
		$this->attributes['style'][$name] = ( string ) $value;
		return $this;
	}

	/**
	 * Remove um estilo
	 *
	 * @param string $name
	 * @return HtmlNode
	 */
	public function removeStyle( $name ) {
		if ( $this->hasAttribute('style') ) {
			unset($this->attributes['style'][$name]);
			if ( empty($this->attributes['style']) ) {
				unset($this->attributes['style']);
			}
		}
		return $this;
	}

	/**
	 * Verifica se um estilo existe
	 *
	 * @param string $name
	 * @return boolean
	 */
	public function hasStyle( $name ) {
		return $this->hasAttribute('style') && isset($this->attributes['style'][$name]);
	}

	/**
	 * Atribui um atributo
	 *
	 * @param string $name
	 * @param string|array $value
	 * @return HtmlNode
	 * @throws \InvalidArgumentException
	 */
	public function setAttribute( $name, $value ) {
		$name = strtolower($name);
		
		if ( $value === null ) {
			$this->removeAttribute($name);
		} else {
			switch ( $name ) {
				case 'class':
					$this->attributes['class'] = array();
					if ( ! is_array($value) ) {
						$value = explode(' ', $value);
					}
					foreach ( $value as $class ) {
						$this->addClass($class);
					}
					break;
				case 'style':
					if ( ! is_array($value) ) {
						throw new \InvalidArgumentException('value of attribute style not is array');
					}
					$this->attributes['style'] = array();
					foreach ( $value as $name => $value ) {
						$this->addStyle($name, $value);
					}
					break;
				
				default:
					$this->attributes[$name] = ( string ) $value;
					break;
			}
		}
		
		return $this;
	}

	/**
	 * Obtem atributo
	 *
	 * @param string $name
	 * @return string array
	 */
	public function getAttribute( $name ) {
		return $this->hasAttribute($name) ? $this->attributes[$name] : null;
	}

	/**
	 * Verifica se um atributo existe
	 *
	 * @param string $name
	 * @return boolean
	 */
	public function hasAttribute( $name ) {
		return isset($this->attributes[$name]);
	}

	/**
	 * Remove um atributo
	 *
	 * @param string $name
	 * @return HtmlNode
	 */
	public function removeAttribute( $name ) {
		unset($this->attributes[$name]);
		return $this;
	}

	/**
	 * Obtem todos os atributos
	 *
	 * @return array
	 */
	public function getAllAttributes() {
		return $this->attributes;
	}

	/**
	 * Obtem o nome de todos os atributos
	 *
	 * @return array
	 */
	public function getAllKeyAttributes() {
		return array_keys($this->attributes);
	}

	/**
	 * Adiciona um no filho no fim da lista
	 *
	 * @param HtmlNode|scalar $node
	 * @return HtmlNode
	 * @throws \UnexpectedValueException
	 * @throws \InvalidArgumentException
	 */
	public function appendNode( $node ) {
		if ( $this->single ) {
			throw new \UnexpectedValueException('Node is a single tag and cannot contain child nodes');
		}
		if ( ! ( is_scalar($node) || $node instanceof HtmlNode || $node === null ) ) {
			throw new \InvalidArgumentException('node not is scalar or instance of PHPBootstrap\\Render\\Html5\\HtmlNode');
		}
		array_push($this->nodes, $node);
		return $this;
	}

	/**
	 * Adiciona um no filho no inicio da lista
	 *
	 * @param HtmlNode|scalar $node
	 * @return HtmlNode
	 * @throws \UnexpectedValueException
	 * @throws \InvalidArgumentException
	 */
	public function prependNode( $node ) {
		if ( $this->single ) {
			throw new \UnexpectedValueException('Node is a single tag and cannot contain child nodes');
		}
		if ( ! ( is_scalar($node) || $node instanceof HtmlNode ) ) {
			throw new \InvalidArgumentException('node not is scalar or instance of PHPBootstrap\\Render\\Html5\\HtmlNode');
		}
		array_unshift($this->nodes, $node);
		return $this;
	}

	/**
	 * Remove no filho
	 *
	 * @param HtmlNode|string $node
	 * @return HtmlNode
	 */
	public function removeNode( $node ) {
		$key = array_search($node, $this->nodes);
		if ( $key !== null ) {
			$this->nodes[$key];
		}
		return $this;
	}

	/**
	 * Obtem todos os nós filhos
	 *
	 * @return array
	 */
	public function getAllNodes() {
		return $this->nodes;
	}

	/**
	 * Remove todos os atributos e nós
	 *
	 * @return HtmlNode
	 */
	public function clear() {
		$this->nodes = array();
		$this->attributes = array();
		return $this;
	}

	/**
	 *
	 * @see Response::flush()
	 */
	public function flush() {
		echo $this;
	}

	/**
	 * Converte objeto em string
	 *
	 * @return string
	 */
	public function __toString() {
		$str = '<' . $this->tagName;
		if ( ! empty($this->attributes) ) {
			$attr = $this->attributes;
			if ( isset($attr['class']) ) {
				$attr['class'] = implode(' ', $attr['class']);
			}
			if ( isset($attr['style']) ) {
				foreach ( $attr['style'] as $name => $value ) {
					$style[] = $name . ': ' . $value;
				}
				$attr['style'] = implode('; ', $style);
			}
			foreach ( $attr as $key => $value ) {
				$attr[$key] = $key . '="' . $value . '"';
			}
			$str .= ' ' . implode(' ', $attr);
		}
		$str .= '>';
		if ( ! $this->single ) {
			$str .= implode('', $this->nodes);
			$str .= '</' . $this->tagName . '>';
		}
		return $str;
	}

}
?>