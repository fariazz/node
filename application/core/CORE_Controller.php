<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CORE_Controller
 */
abstract class CORE_Controller extends CI_Controller {
    
    /**
     * @see get_instance()
     * @var object Instance of CodeIgniter core object
     */
    protected static $_ci;
    /**
     *
     * @var View the view object of content view
     */
    protected $_contentView;
    /**
     *
     * @var string default template name
     */
    private $_defaultViewTpl = 'templates/index';

     /**
     * @var string default site language 
     */
    protected $_defaultLang = 'nl';
    
    public function __construct()
    {
        parent::__construct();
        //init loggers
        $this->_initLoggers();
        // Get ci instance
        self::$_ci = get_instance();
        // Check if user is logged in
		if(!$this->ion_auth->logged_in())
  		{
     		if (self::$_ci->router->class == 'auth' && self::$_ci->router->method == 'login'  )
			{
		  		$this->_defaultViewTpl = 'templates/login';
			}
			else
			{
   				redirect('auth/login');
			}
		}
        $this->_initView($this->_defaultViewTpl);
        // Load HTML header
        $this->_setSiteHeader();
        // Load content header
        $this->_loadContentHeader();
        // Load sidebar
        $this->_loadContentSidebar();
        // Load default view
        $this->_loadDefaultView();
        
        // For debugging purposes, just (un)comment line bellow
        //$this->output->enable_profiler(TRUE);
        //put languages to the view (used later in javascript)
        $this->load->model('languages');
        $this->view->set('languages', $this->languages->getLanguages());
        //provide default language id
        $this->view->set('default_lang_id', $this->languages->defaultLanguageId);
        
        // Check if user may access this page
        if ($this->uri->uri_string() != "/auth/login" AND $this->uri->uri_string() != "/auth/logout") {
            
            // now only check for the 'main' core pages (otherwise, all our ajax calls will not be working :()
            /*if (!checkAcl($this->session->userdata('group_id'), $this->uri->segment(1), 'controller')) {

                //die('You may not access this page!'); 
                
                // refactored cause die message we don't see in command line 
                // and wasting time to find out the error type 
                echo 'You may not access this page!'; exit(); 
            }*/
        }
    }

    /**
     * Load the content header (in <body></body>);
     */
    private function _loadContentHeader()
    {
        $headerContent =  new View('components/content_header');
        $this->view->set('headerContent', $headerContent);
    }

    /*
     * Load HTML Header
     */
    protected function _setSiteHeader()
    {
        $this->cpin2_header->registerCss('datepicker.css');
        $this->cpin2_header->registerCss('stylez.css');
        $this->cpin2_header->registerCss('jquery-ui-1.8.9.custom.css');
        $this->cpin2_header->registerCss('core.css');
        $this->cpin2_header->registerCss('grid/ui.jqgrid.css');
        
        $this->cpin2_header->registerJs('jquery-1.4.2.min.js');
        $this->cpin2_header->registerJs('jquery-blink.js');
        $this->cpin2_header->registerJs('jquery-ui-1.8.9.custom.min.js');
        $this->cpin2_header->registerJs('menu.js');
        $this->cpin2_header->registerJs('core/core.js');
        $this->cpin2_header->registerJs('jquery-validate/jquery.validate.min.js');
        $this->cpin2_header->registerJs('jquery.selectboxes.pack.js');
        // Library to bind keyboard shortcuts based on jQuery
        // TODO: re-enable in next brench! $this->cpin2_header->registerJs('jquery.hotkeys.js');
        // General JS library for JS snippets
        $this->cpin2_header->registerJs('lib.js');
        //jquery ui
        $this->cpin2_header->registerJs('grid/jquery.jqGrid.min.js');
        $this->cpin2_header->registerJs('grid/i18n/grid.locale-en.js');
        $this->cpin2_header->registerJs('grid/src/grid.base.js');
        $this->cpin2_header->registerJs('grid/src/grid.formedit.js');
        $this->cpin2_header->registerJs('grid/src/grid.inlinedit.js');
        $this->cpin2_header->registerJs('grid/src/grid.common.js');
        //eo jquery ui
        //add ckeditor from bundle
        $this->cpin2_header->registerBundle('ckeditor/ckeditor.js');
        
        $this->cpin2_header->addMetaTag(array('http-equiv' => 'X-UA-Compatible','content' => 'IE=EmulateIE7'));
        
        $this->view->set('siteHeader', $this->cpin2_header);
    }

    /**
     * Load the sidebar in content
     */
    private function _loadContentSidebar()
    {
        $sidebar = new View('components/sidebar');
        $this->view->set('sidebar', $sidebar);
    }

    protected function _initView($template)
    {
        if (!isset($this->view)) {
            // Load view
            $this->load->library('view');
        }
        // Assign template
        $this->view->layout = $template;
    }

    protected function _loadDefaultView()
    {
        $this->view->loadDefaultView();
    }
    /**
     * routes user to approirate site index accorting to request
     */
    private function _routeToIndex()
    {
        $siteUrl = self::$_ci->config->config['base_url'];
        if ($this->_defaultDomainName != $siteUrl) {
            // Index action check url check
            if (array_key_exists($siteUrl, $this->_customSiteIndexActions)) {
                // Redirect to provided class
                redirect($this->_customSiteIndexActions[$siteUrl], 'location');
            }
        }
    }
    /**
     * Get languages for unternal needs
     * @return array Array of languages
     */
    protected function getLanguages()
    {
        $this->load->model('languages');
        $languagesModel = new Languages();
        $languages = array();
        foreach($languagesModel->getLanguages() as $language) {
            $languages[$language->id] = $language->code;   
        }
        return $languages;
    }
    /**
     * Initiates core loggers
     * @author Alexey Galiullin
     */
    private function _initLoggers()
    {
        //load reqistry
        $this->load->helper('cpin2_registry');
        //load common logger client
        $this->load->helper('cpin2_loggerclient');
        //load logger action execution
        $this->load->helper('cpin2_loggeractionexecution');
        //load local client
        $this->load->helper('cpin2_loggergeneral');
        //create general logger instance
        $logger = new Cpin2_LoggerGeneral();
        //create action logger instance
        $loggerAction = new Cpin2_LoggerActionExecution();
        //add action logger
        $logger->addLogger('logger action', $loggerAction);
        //add logger to the registry
        Cpin2_Registry::set('logger', $logger);

        
    }
}
/* End of file CORE_Controller.php */
/* Location: ./application/core/CORE_Controller.php */