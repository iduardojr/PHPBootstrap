<?php
namespace PHPBootstrap\Widget\Form;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\Button\Btn;
use PHPBootstrap\Widget\AbstractContainer;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Common\ArrayIterator;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Button\BtnChain;

/**
 * Formulario
 */
class Form extends AbstractContainer {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form';
	
	// Codificaчуo
	const MultiPart = 'multipart/form-data';
	const URLEncoded = 'application/x-www-form-urlencoded';
	
	// Metodos
	const Get = 'get';
	const Post = 'post';

	// Estilos
	const Horizontal = 'form-horizontal';
	const Inline = 'form-inline';
	const Search = 'form-search';
	
	// Eventos
	const Validate = 'validate';
	const ChangeValue = 'value';
	
	/**
	 * Controles
	 *
	 * @var ArrayCollection
	 */
	protected $controls;

	/**
	 * Grupo de botoes
	 *
	 * @var ArrayCollection
	 */
	protected $buttons;

	/**
	 * Estilo
	 *
	 * @var FormStyle
	 */
	protected $style;

	/**
	 * Metodo
	 *
	 * @var FormMethod
	 */
	protected $method;

	/**
	 * Codificaчуo
	 *
	 * @var FormEncoding
	 */
	protected $encoding;

	/**
	 * Messages de erro da validaчуo
	 *
	 * @var array
	 */
	protected $messages;

	/**
	 * Validaчуo do formulario
	 *
	 * @var boolean
	 */
	protected $valid;

	/**
	 * Registro automatico
	 *
	 * @var boolean
	 */
	protected $autoRegister;

	/**
	 * Comportamentos
	 * 
	 * @var ArrayCollection
	 */
	protected $behaviors;
	
	/**
	 * Construtor 
	 * - Form.Get
	 * - Form.Post
	 *
	 * @param string $name
	 * @param string $method
	 */
	public function __construct( $name, $method = null ) {
		parent::__construct();
		$this->controls = new ArrayCollection();
		$this->buttons = new ArrayCollection();
		$this->behaviors = new ArrayCollection();
		$this->setName($name);
		$this->setMethod($method);
		$this->setEncoding(null);
		$this->setAutoRegister(false);
	}

	/**
	 * Obtem o registro automatico dos inputs
	 *
	 * @return boolean
	 */
	public function getAutoRegister() {
		return $this->autoRegister;
	}

	/**
	 * Atribui o registro dos inputs automaticamente
	 *
	 * @param boolean $autoregister
	 */
	public function setAutoRegister( $autoregister ) {
		$this->autoRegister = ( bool ) $autoregister;
	}

	/**
	 * Atribui o metodo http:
	 * - Form.Get
	 * - Form.Post
	 *
	 * @param string $method
	 * @throws \UnexpectedValueException
	 */
	public function setMethod( $method ) {
		$enum[] = Form::Get;
		$enum[] = Form::Post;
		$this->method = Enum::ensure($method, $enum, Form::Post);
	}

	/**
	 * Obtem o metodo
	 *
	 * @return string
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * Obtem a codificaчуo
	 *
	 * @return string
	 */
	public function getEncoding() {
		return $this->encoding;
	}

	/**
	 * Atribui a codificaчуo:
	 * - Form.MultiPart
	 * - Form.URLEncoded
	 *
	 * @param string $encoding
	 * @throws \UnexpectedValueException
	 */
	public function setEncoding( $encoding ) {
		$enum[] = Form::MultiPart;
		$enum[] = Form::URLEncoded;
		$this->encoding = Enum::ensure($encoding, $enum, Form::URLEncoded);
	}

	/**
	 * Obtem estilo
	 *
	 * @return string
	 */
	public function getStyle() {
		return $this->style;
	}

	/**
	 * Atribui estilo: 
	 * - Form.Horizontal
	 * - Form.Inline
	 * - Form.Search
	 *
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function setStyle( $style ) {
		$enum[] = Form::Horizontal;
		$enum[] = Form::Inline;
		$enum[] = Form::Search;
		$this->style = Enum::ensure($style, $enum, null);
	}

	/**
	 * Registra um input
	 *
	 * @param Inputable $input
	 * @return boolean
	 */
	public function register( Inputable $input ) {
		$this->valid = null;
		if ( ! $this->controls->contains($input) ) {
			$this->controls->add($input);
			return true;
		}
		return false;
	}

	/**
	 * Remove um input do formulario
	 *
	 * @param Inputable $input
	 * @return boolean
	 */
	public function unregister( Inputable $input ) {
		$this->valid = null;
		return $this->controls->remove($input);
	}

	/**
	 * Obtem todos os controles registrados
	 *
	 * @return ArrayIterator
	 */
	public function getControls() {
		return $this->controls->getIterator();
	}

	/**
	 * Obtem os dados nуo filtrados
	 *
	 * @return array
	 */
	public function getRawValues() {
		$data = array();
		foreach ( $this->controls as $control ) {
			if ( $control instanceof TextEditable ) {
				$data[$control->getName()] = $control->getText();
			} else {
				$data[$control->getName()] = $control->getValue();
			}
		}
	}

	/**
	 * Obtem os dados do formulario
	 *
	 * @return array
	 */
	public function getData() {
		$data = array();
		foreach ( $this->controls as $control ) {
			$data[$control->getName()] = $control->getValue();
		}
		return $data;
	}

	/**
	 * Atribui dados ao formulario
	 *
	 * @param array $data
	 */
	public function setData( array $data ) {
		$this->valid = null;
		foreach ( $this->controls as $control ) {
			$value = isset($data[$control->getName()]) ? $data[$control->getName()] : null;
			$control->setValue($value);
		}
		$this->trigger(Form::ChangeValue);
	}

	/**
	 * Liga os dados submetidos ao formulario
	 *
	 * @param array $submittedData
	 */
	public function bind( array $submittedData ) {
		$this->valid = null;
		foreach ( $this->controls as $control ) {
			$value = isset($submittedData[$control->getName()]) ? $submittedData[$control->getName()] : null;
			if ( $control instanceof TextEditable ) {
				$control->setText($value);
			} else {
				$control->setValue($value);
			}
		}
		$this->trigger(Form::ChangeValue);
	}

	/**
	 * Prepara o formulario e seus controles para a renderizaчуo
	 */
	public function prepare() {
		foreach ( $this->controls as $control ) {
			$control->prepare($this);
		}
	}

	/**
	 * Valida o formulсrio
	 *
	 * @return boolean
	 */
	public function valid() {
		if ( $this->valid === null ) {
			$response = true;
			$this->messages = array();
			foreach ( $this->controls as $control ) {
				if ( ! $control->valid() ) {
					$response = false;
					$this->messages[$control->getName()] = $control->getFailMessages();
				}
			}
			$this->valid = $response;
			$this->trigger(Form::Validate);
		}
		return $this->valid;
	}

	/**
	 * Obtem as messages de erro
	 *
	 * @return ArrayIterator
	 */
	public function getFailMessages() {
		if ( $this->valid === null ) {
			$this->valid();
		}
		return new ArrayIterator($this->messages);
	}

	/**
	 * Adiciona um botуo ao formalario
	 *
	 * @param Btn $button
	 * @return boolean
	 */
	public function addButton( Btn $button ) {
		if ( ! $this->buttons->contains($button) ) {
			$this->buttons->add($button);
			return true;
		}
		return false;
	}

	/**
	 * Obtem um botуo a partir do nome
     *
	 * @param string $name
	 * @return Button
	 */
	public function getButtonByName( $name ) {
		foreach ( $this->buttons as $button ) {
			if ( $button instanceof Button && $button->getName() == $name ) {
				return $button;
			}
			if ( $button instanceof BtnChain ) {
				$button = $button->getButtonByName($name);
				if ( $button ) {
					return $button;
				}
			}
		}
		return null;
	}

	/**
	 * Remove um botуo do formulario
	 *
	 * @param Btn $button
	 * @return boolean
	 */
	public function removeButton( Btn $button ) {
		return $this->buttons->remove($button);
	}

	/**
	 * Obtem os botoes registrados no formulario
	 *
	 * @return ArrayIterator
	 */
	public function getButtons() {
		return $this->buttons->getIterator();
	}
	
	/**
	 * @see AbstractContainer::getByName()
	 */
	public function getByName( $name ) {
		$widget = parent::getByName($name);
		if ( $widget === null ) {
			$widget = $this->getButtonByName($name);
		}
		return $widget;
	}

	/**
	 * Atribui um evento ao formulario:
	 * - Form.Validate
	 * - Form.ChangeValue
	 *
	 * @param string $event
	 * @param \Closure $handler
	 * @throws \UnexpectedValueException
	 */
	public function attach( $event, \Closure $handler ) {
		$this->behaviors->set(Enum::ensure($event, array(Form::Validate, Form::ChangeValue)), $handler);
	}

	/**
	 * Remove um evento do formulario e retorna o closure:
	 * - Form.Validate
	 * - Form.ChangeValue
	 *
	 * @param string $event
	 * @return \Closure
	 * @throws \UnexpectedValueException
	 */
	public function detach( $event ) {
		return $this->behaviors->removeKey(Enum::ensure($event, array(Form::Validate, Form::ChangeValue)));
	}

	/**
	 * Dispara um evento e retorna se deve seguir ou nуo com o padrуo do evento: 
	 * - Form.Validate
	 * - Form.ChangeValue
	 *
	 * @param string $event
	 * @param array $data
	 * @return boolean
	 * @throws \RuntimeException
	 * @throws \UnexpectedValueException
	 */
	protected function trigger( $event, array $data = array() ) {
		$event = Enum::ensure($event, array(Form::Validate, Form::ChangeValue));
		if ( $this->behaviors && $this->behaviors->containsKey($event) ) {
			$handler = $this->behaviors->get($event);
			if ( call_user_func($handler, $this, $data) === false ) {
				return false;
			}
		}
		return true;
	}
	
	/**
	 * Processa um elemento antes de inserir
	 *
	 * @param Widget $widget
	 */
	protected function _insert( Widget $widget ) {
		if ( $this->autoRegister ) {
			if ( $widget instanceof Inputable ) {
				$this->register($widget);
			} elseif ( $widget instanceof AbstractContainer ) {
				$this->registerContainers($widget);
			}
		}
		$widget->setParent($this);
	}

	/**
	 * Processa um elemento antes de remover
	 *
	 * @param Widget $widget
	 */
	protected function _remove( Widget $widget ) {
		if ( $this->autoRegister ) {
			if ( $widget instanceof Inputable ) {
				$this->unregister($widget);
			} elseif ( $widget instanceof AbstractContainer ) {
				$this->unregisterContainers($widget);
			}
		}
		$widget->setParent(null);
	}

	/**
	 * Registra os inputs de um container
	 *
	 * @param AbstractContainer $container
	 */
	private function registerContainers( AbstractContainer $container ) {
		if ( $container instanceof Form ) {
			return null;
		}
		foreach ( $container->getIterator() as $content ) {
			if ( $content instanceof Inputable ) {
				$this->register($content);
			} else if ( $content instanceof AbstractContainer ) {
				$this->registerContainers($content);
			}
		}
	}

	/**
	 * Remove os registros dos inputs de um container
	 *
	 * @param AbstractContainer $container
	 */
	private function unregisterContainers( AbstractContainer $container ) {
		if ( $container instanceof Form ) {
			return null;
		}
		foreach ( $container->getIterator() as $content ) {
			if ( $content instanceof Inputable ) {
				$this->unregister($content);
			} else if ( $content instanceof AbstractContainer ) {
				$this->unregisterContainers($content);
			}
		}
	}

}
?>