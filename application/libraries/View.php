<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* View Object
* 
* Renders a layout with partials (blocks) inside.
* Renders partials only (header,content,footer. etc).
* Allows a plugin or module to render a partial.
* 
* 
* Version 3.0.7 Wiredesignz (c) 2008-10-01
**/
class View
{
    public $layout;
    
    private $partials = array();
    
    private $vars = array();
    
    private static $ci;
    
    public function __construct($file = NULL, $data = NULL) /* you can assign a template & data */
    {
        (isset(self::$ci)) OR self::$ci = get_instance();
        
        $this->layout = $file;
        
        (is_array($data)) AND $this->vars = $data;
    }
       
    public function load($view, $file = NULL, $data = NULL) /* add a partial & data */
    {
        //--------------------------------------------------------
        //Custom change
        // comment this if which give possibility to reload view objects
//        if ( ! isset($this->partials[$view]))
        
            $this->partials[$view] = (is_object($file)) ? $file : new View($file);
        
        (is_array($data)) AND $this->partials[$view]->set($data);
        
        return $this->partials[$view];
    }
    
    public function __set($variable, $value)
    {
        (is_array($value)) ? $this->set($value) : $this->set($variable, $value);
    }
    
    public function set($var, $value = NULL) /* store data for this view */
    {
        ($var) ? (is_array($var)) ? $this->vars = $var : $this->vars[$var] = $value : NULL;
    }
    /**
     * Custom method
     * @param string $name 
     */
    public function unsetVar($name) 
    {
        unset($this->vars[$name]);
    }

    public function __get($variable)
    {
        //----------------------------------------------------------------------
        //custom change. Return in more easy and convenient way
        //----------------------------------------------------------------------
        return array_key_exists($variable, $this->vars) ? 
                                    $this->vars[$variable] : NULL;
    }
        
    public function fetch($key = NULL) /* returns data value(s) */
    {
        return ($key) ? (isset($this->vars[$key])) ? $this->vars[$key] : NULL : $this->vars;
    }
        
    public function __toString()
    {        
        return $this->render(TRUE);
    }
    
    public function render($render = FALSE) /* render the view */
    {
        self::$ci->load->vars($this->vars);
        
        if ($this->layout)
        {
            return self::$ci->load->view($this->layout, $this->partials, $render);
        }
        else 
        {
            ob_start();
            
            foreach($this->partials as $partial) 

                $partial->render();
                
            if ($render) return ob_get_clean();
            
            echo ob_get_clean();
        }
    }
    /**
     * -------------------------------------------------------------------------
     * Custom method. Provides automatic assigment of partial view content file
     * according to controller action name
     * -------------------------------------------------------------------------
     * @author Alexey Galiullin
     * @return View | null 
     */
    public function loadDefaultView($ext = '.php')
    {
        if (!array_keys($this->partials, 'content')) {
            $router = self::$ci->router;
            //content file not provided try to assign own
            $viewPath = 'scripts'       . DIRECTORY_SEPARATOR .
                        $router->class  . DIRECTORY_SEPARATOR . 
                        $router->method . $ext;
            
            $fullPath = APPPATH . 'views' . DIRECTORY_SEPARATOR . $viewPath;
           
            if (is_file($fullPath)) {
                //create content view
                $content = new View($viewPath);
                //load content view
                $res = $this->load('content', $content);
                
                return $content;
            }
        }
        return null;
    }
    
     
     
     /**
     * 
     * -------------------------------------------------------------------------
     */
    
}  