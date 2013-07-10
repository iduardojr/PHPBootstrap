<?php
namespace PHPBootstrap\Render;

/**
 * Conjunto de Renderizadores
 */
class RenderKit {

	/**
	 * Instancia
	 *
	 * @var RenderKit
	 */
	protected static $instance;

	/**
	 * Coleção de renderizadores
	 *
	 * @var array
	 */
	protected $renderers = array();

	/**
	 * Construtor
	 */
	protected function __construct() {
		$this->renderers['phpbootstrap.widget.action.link'] = 'PHPBootstrap\Render\Html5\Action\RendererTgLink';
		$this->renderers['phpbootstrap.widget.action.ajax'] = 'PHPBootstrap\Render\Html5\Action\RendererTgAjax';
		$this->renderers['phpbootstrap.widget.action.windows'] = 'PHPBootstrap\Render\Html5\Action\RendererTgWindows';
		$this->renderers['phpbootstrap.widget.component'] = 'PHPBootstrap\Render\Html5\RendererComponent';
		$this->renderers['phpbootstrap.widget.layout.panel'] = 'PHPBootstrap\Render\Html5\Layout\RendererPanel';
		$this->renderers['phpbootstrap.widget.layout.container'] = 'PHPBootstrap\Render\Html5\Layout\RendererContainer';
		$this->renderers['phpbootstrap.widget.layout.box'] = 'PHPBootstrap\Render\Html5\Layout\RendererBox';
		$this->renderers['phpbootstrap.widget.layout.row'] = 'PHPBootstrap\Render\Html5\Layout\RendererRow';
		$this->renderers['phpbootstrap.widget.accordion'] = 'PHPBootstrap\Render\Html5\Accordion\RendererAccordion';
		$this->renderers['phpbootstrap.widget.accordion.item'] = 'PHPBootstrap\Render\Html5\Accordion\RendererAccordionItem';
		$this->renderers['phpbootstrap.widget.collapse.toggle'] = 'PHPBootstrap\Render\Html5\Collapse\RendererTgCollapse';
		$this->renderers['phpbootstrap.widget.tooltip'] = 'PHPBootstrap\Render\Html5\Tooltip\RendererTooltip';
		$this->renderers['phpbootstrap.widget.tooltip.popover'] = 'PHPBootstrap\Render\Html5\Tooltip\RendererPopover';
		$this->renderers['phpbootstrap.widget.misc.alert'] = 'PHPBootstrap\Render\Html5\Misc\RendererAlert';
		$this->renderers['phpbootstrap.widget.misc.anchor'] = 'PHPBootstrap\Render\Html5\Misc\RendererAnchor';
		$this->renderers['phpbootstrap.widget.misc.descriptions'] = 'PHPBootstrap\Render\Html5\Misc\RendererDescriptions';
		$this->renderers['phpbootstrap.widget.misc.badge'] = 'PHPBootstrap\Render\Html5\Misc\RendererBadge';
		$this->renderers['phpbootstrap.widget.misc.breadcrumb'] = 'PHPBootstrap\Render\Html5\Misc\RendererBreadcrumb';
		$this->renderers['phpbootstrap.widget.misc.herounit'] = 'PHPBootstrap\Render\Html5\Misc\RendererHeroUnit';
		$this->renderers['phpbootstrap.widget.misc.icon'] = 'PHPBootstrap\Render\Html5\Misc\RendererIcon';
		$this->renderers['phpbootstrap.widget.misc.image'] = 'PHPBootstrap\Render\Html5\Misc\RendererImage';
		$this->renderers['phpbootstrap.widget.misc.label'] = 'PHPBootstrap\Render\Html5\Misc\RendererLabel';
		$this->renderers['phpbootstrap.widget.misc.paragraph'] = 'PHPBootstrap\Render\Html5\Misc\RendererParagraph';
		$this->renderers['phpbootstrap.widget.misc.title'] = 'PHPBootstrap\Render\Html5\Misc\RendererTitle';
		$this->renderers['phpbootstrap.widget.misc.well'] = 'PHPBootstrap\Render\Html5\Misc\RendererWell';
		$this->renderers['phpbootstrap.widget.tree'] = 'PHPBootstrap\Render\Html5\Tree\RendererTree';
		$this->renderers['phpbootstrap.widget.tree.toggle'] = 'PHPBootstrap\Render\Html5\Tree\RendererTgTree';
		$this->renderers['phpbootstrap.widget.tree.node'] = 'PHPBootstrap\Render\Html5\Tree\RendererTreeNode';
		$this->renderers['phpbootstrap.widget.thumbnail'] = 'PHPBootstrap\Render\Html5\Thumbnail\RendererThumbnail';
		$this->renderers['phpbootstrap.widget.thumbnail.list'] = 'PHPBootstrap\Render\Html5\Thumbnail\RendererThumbnailList';
		$this->renderers['phpbootstrap.widget.media'] = 'PHPBootstrap\Render\Html5\Media\RendererMedia';
		$this->renderers['phpbootstrap.widget.media.list'] = 'PHPBootstrap\Render\Html5\Media\RendererMediaList';
		$this->renderers['phpbootstrap.widget.progress'] = 'PHPBootstrap\Render\Html5\Progress\RendererProgressBar';
		$this->renderers['phpbootstrap.widget.progress.bar'] = 'PHPBootstrap\Render\Html5\Progress\RendererBar';
		$this->renderers['phpbootstrap.widget.slide.toggle'] = 'PHPBootstrap\Render\Html5\Slide\RendererTgSlide';
		$this->renderers['phpbootstrap.widget.tab.toggle'] = 'PHPBootstrap\Render\Html5\Tab\RendererTgTab';
		$this->renderers['phpbootstrap.widget.collapse.toggle'] = 'PHPBootstrap\Render\Html5\Collapse\RendererTgCollapse';
		$this->renderers['phpbootstrap.widget.dropdown'] = 'PHPBootstrap\Render\Html5\Dropdown\RendererDropdown';
		$this->renderers['phpbootstrap.widget.dropdown.link'] = 'PHPBootstrap\Render\Html5\Dropdown\RendererDropdownLink';
		$this->renderers['phpbootstrap.widget.dropdown.divider'] = 'PHPBootstrap\Render\Html5\Dropdown\RendererDropdownDivider';
		$this->renderers['phpbootstrap.widget.dropdown.header'] = 'PHPBootstrap\Render\Html5\Dropdown\RendererDropdownHeader';
		$this->renderers['phpbootstrap.widget.dropdown.toggle'] = 'PHPBootstrap\Render\Html5\Dropdown\RendererTgDropdown';
		$this->renderers['phpbootstrap.widget.button'] = 'PHPBootstrap\Render\Html5\Button\RendererButton';
		$this->renderers['phpbootstrap.widget.button.group'] = 'PHPBootstrap\Render\Html5\Button\RendererButtonGroup';
		$this->renderers['phpbootstrap.widget.button.toolbar'] = 'PHPBootstrap\Render\Html5\Button\RendererButtonToolbar';
		$this->renderers['phpbootstrap.widget.carousel'] = 'PHPBootstrap\Render\Html5\Carousel\RendererCarousel';
		$this->renderers['phpbootstrap.widget.carousel.item'] = 'PHPBootstrap\Render\Html5\Carousel\RendererCarouselItem';
		$this->renderers['phpbootstrap.widget.modal'] = 'PHPBootstrap\Render\Html5\Modal\RendererModal';
		$this->renderers['phpbootstrap.widget.modal.close'] = 'PHPBootstrap\Render\Html5\Modal\RendererTgModalClose';
		$this->renderers['phpbootstrap.widget.modal.confirm'] = 'PHPBootstrap\Render\Html5\Modal\RendererTgModalConfirm';
		$this->renderers['phpbootstrap.widget.modal.load'] = 'PHPBootstrap\Render\Html5\Modal\RendererTgModalLoad';
		$this->renderers['phpbootstrap.widget.modal.open'] = 'PHPBootstrap\Render\Html5\Modal\RendererTgModalOpen';
		$this->renderers['phpbootstrap.widget.pagination'] = 'PHPBootstrap\Render\Html5\Pagination\RendererPagination';
		$this->renderers['phpbootstrap.widget.pagination.pager'] = 'PHPBootstrap\Render\Html5\Pagination\RendererPager';
		$this->renderers['phpbootstrap.widget.pagination.pagerbar'] = 'PHPBootstrap\Render\Html5\Pagination\RendererPagerBar';
		$this->renderers['phpbootstrap.widget.nav'] = 'PHPBootstrap\Render\Html5\Nav\RendererNav';
		$this->renderers['phpbootstrap.widget.nav.navbar'] = 'PHPBootstrap\Render\Html5\Nav\RendererNavbar';
		$this->renderers['phpbootstrap.widget.nav.item'] = 'PHPBootstrap\Render\Html5\Nav\RendererNavItem';
		$this->renderers['phpbootstrap.widget.nav.link'] = 'PHPBootstrap\Render\Html5\Nav\RendererNavLink';
		$this->renderers['phpbootstrap.widget.nav.divider'] = 'PHPBootstrap\Render\Html5\Nav\RendererNavDivider';
		$this->renderers['phpbootstrap.widget.nav.header'] = 'PHPBootstrap\Render\Html5\Nav\RendererNavHeader';
		$this->renderers['phpbootstrap.widget.nav.text'] = 'PHPBootstrap\Render\Html5\Nav\RendererNavText';
		$this->renderers['phpbootstrap.widget.nav.brand'] = 'PHPBootstrap\Render\Html5\Nav\RendererNavBrand';
		$this->renderers['phpbootstrap.widget.nav.tabbable'] = 'PHPBootstrap\Render\Html5\Nav\RendererTabbable';
		$this->renderers['phpbootstrap.widget.nav.tabpane'] = 'PHPBootstrap\Render\Html5\Nav\RendererTabPane';
		$this->renderers['phpbootstrap.widget.table'] = 'PHPBootstrap\Render\Html5\Table\RendererTable';
		$this->renderers['phpbootstrap.widget.table.toggle'] = 'PHPBootstrap\Render\Html5\Table\RendererTgTableSelect';
		$this->renderers['phpbootstrap.widget.table.column.text'] = 'PHPBootstrap\Render\Html5\Table\RendererColumnText';
		$this->renderers['phpbootstrap.widget.table.column.select'] = 'PHPBootstrap\Render\Html5\Table\RendererColumnSelect';
		$this->renderers['phpbootstrap.widget.table.column.action'] = 'PHPBootstrap\Render\Html5\Table\RendererColumnAction';
		$this->renderers['phpbootstrap.widget.table.pagination'] = 'PHPBootstrap\Render\Html5\Table\RendererTablePagination';
		$this->renderers['phpbootstrap.widget.form'] = 'PHPBootstrap\Render\Html5\Form\RendererForm';
		$this->renderers['phpbootstrap.widget.form.toggle.clear'] = 'PHPBootstrap\Render\Html5\Form\RendererTgFormClear';
		$this->renderers['phpbootstrap.widget.form.toggle.reset'] = 'PHPBootstrap\Render\Html5\Form\RendererTgFormReset';
		$this->renderers['phpbootstrap.widget.form.toggle.submit'] = 'PHPBootstrap\Render\Html5\Form\RendererTgFormSubmit';
		$this->renderers['phpbootstrap.widget.form.control.group'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererControlGroup';
		$this->renderers['phpbootstrap.widget.form.control.help'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererHelp';
		$this->renderers['phpbootstrap.widget.form.control.output'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererOutput';
		$this->renderers['phpbootstrap.widget.form.control.output.uneditable'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererOutputUneditable';
		$this->renderers['phpbootstrap.widget.form.control.output.label'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererOutputLabel';
		$this->renderers['phpbootstrap.widget.form.control.output.fieldset'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererOutputFieldset';
		$this->renderers['phpbootstrap.widget.form.control.input.hidden'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputHidden';
		$this->renderers['phpbootstrap.widget.form.control.input.textbox'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputTextBox';
		$this->renderers['phpbootstrap.widget.form.control.input.passwordbox'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputPasswordBox';
		$this->renderers['phpbootstrap.widget.form.control.input.numberbox'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputNumberBox';
		$this->renderers['phpbootstrap.widget.form.control.input.filebox'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputFileBox';
		$this->renderers['phpbootstrap.widget.form.control.input.textarea'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputTextArea';
		$this->renderers['phpbootstrap.widget.form.control.input.richtext'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputRichText';
		$this->renderers['phpbootstrap.widget.form.control.input.checkbox'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputCheckBox';
		$this->renderers['phpbootstrap.widget.form.control.input.radiobutton'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputRadioButton';
		$this->renderers['phpbootstrap.widget.form.control.input.checkboxlist'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputCheckBoxList';
		$this->renderers['phpbootstrap.widget.form.control.input.radiobuttonlist'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputRadioButtonList';
		$this->renderers['phpbootstrap.widget.form.control.input.combobox'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputComboBox';
		$this->renderers['phpbootstrap.widget.form.control.input.xfilebox'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputXFileBox';
		$this->renderers['phpbootstrap.widget.form.control.input.xcombobox'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererInputXComboBox';
		$this->renderers['phpbootstrap.widget.form.control.decorator.typehead'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorTypeHead';
		$this->renderers['phpbootstrap.widget.form.control.decorator.suggest'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorSuggest';
		$this->renderers['phpbootstrap.widget.form.control.decorator.seek'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorSeek';
		$this->renderers['phpbootstrap.widget.form.control.decorator.search'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorTgSearch';
		$this->renderers['phpbootstrap.widget.form.control.decorator.embed'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorEmbed';
		$this->renderers['phpbootstrap.widget.form.control.decorator.addon'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorAddOn';
		$this->renderers['phpbootstrap.widget.form.control.decorator.mask'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorMask';
		$this->renderers['phpbootstrap.widget.form.control.decorator.maskmoney'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorMaskMoney';
		$this->renderers['phpbootstrap.widget.form.control.decorator.validate'] = 'PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorValidate';
		$this->renderers['phpbootstrap.widget.fileupload.toggle'] = 'PHPBootstrap\Render\Html5\FileUpload\RendererTgFileUpload';
		$this->renderers['phpbootstrap.widget.datepicker'] = 'PHPBootstrap\Render\Html5\Datepicker\RendererDatePicker';
		$this->renderers['phpbootstrap.widget.datepicker.toggle'] = 'PHPBootstrap\Render\Html5\Datepicker\RendererTgDatePicker';
		$this->renderers['phpbootstrap.widget.datepicker.suggest'] = 'PHPBootstrap\Render\Html5\Datepicker\RendererDateSuggest';
		$this->renderers['phpbootstrap.widget.colorpicker.toggle'] = 'PHPBootstrap\Render\Html5\Colorpicker\RendererTgColorPicker';
		$this->renderers['phpbootstrap.widget.colorpicker.suggest'] = 'PHPBootstrap\Render\Html5\Colorpicker\RendererColorSuggest';
		$this->renderers['phpbootstrap.widget.timepicker.toggle'] = 'PHPBootstrap\Render\Html5\Timepicker\RendererTgTimePicker';
		$this->renderers['phpbootstrap.widget.timepicker.suggest'] = 'PHPBootstrap\Render\Html5\Timepicker\RendererTimeSuggest';
	}

	/**
	 * Obtem uma instância
	 *
	 * @return RenderKit
	 */
	public static function getInstance() {
		if ( ! isset(self::$instance) ) {
			self::$instance = new RenderKit();
		}
		return self::$instance;
	}

	/**
	 * Renderiza um objeto renderizavel
	 *
	 * @param Render $ui
	 * @param Context $context
	 */
	public function render( Render $ui, Context $context = null ) {
		if ( $context === null ) {
			$context = new Context();
		}
		$renderer = $this->getRenderer($ui);
		$renderer->render($ui, $context);
		if ( $context->getResponse() ) {
			$context->getResponse()->flush();
		}
	}

	/**
	 * Obtem um renderizador do objeto renderizavel
	 *
	 * @param Render $ui
	 * @return Renderer
	 * @throws \OutOfBoundsException
	 */
	public function getRenderer( Render $ui ) {
		if ( ! isset($this->renderers[$ui->getRendererType()]) ) {
			throw new \OutOfBoundsException('no has instance of PHPBootstrap\Render\Renderer for ' . $ui->getRendererType() );
		}
		$renderer = $this->renderers[$ui->getRendererType()];
		if ( is_string($renderer) ) {
			$renderer = new $renderer;
			$this->renderers[$ui->getRendererType()] = $renderer;
		}
		$renderer->setRenderKit($this);
		return $renderer;
	}
	
	/**
	 * Adiciona um renderizador
	 * 
	 * @param string $type
	 * @param string|Renderer $renderer
	 * @throws \InvalidArgumentException
	 */
	public function addRenderer( $type, $renderer ) {
		if ( !is_subclass_of($renderer, 'PHPBootstrap\Render\Renderer' ) ) {
			throw new \InvalidArgumentException('$renderer no is instance of PHPBootstrap\Render\Renderer');
		}
		$this->renderers[$type] = $renderer;
	}

}
?>