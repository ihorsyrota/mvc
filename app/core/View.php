<?php
/**
 * It is a class for viewing dynamic content
 * It has only one method generate ()
 * 
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class View
{
    private $config;
    protected $smarty;
    
    function __construct ( $config )
    {
        $this->config = $config;

        // Attach Smarty Framework
        // Currently it was done in ugly way :(
        // In future it needs to be rewritten more pretty
        // TODO: redesign connection with Smarty
        $this->smarty               = new Smarty();
        $this->smarty->template_dir = './app/templates/';
        $this->smarty->compile_dir  = './app/frameworks/smarty/templates_c/';
        $this->smarty->config_dir   = './app/frameworks/smarty/configs/';
        $this->smarty->plugins_dir  = './app/frameworks/smarty/plugins/';
        $this->smarty->cache_dir    = './app/frameworks/smarty/cache/';
    }

    /**
     * Generates page content by using template, content part and data
     *      for filling content part of page
     * 
     * @param string $contentView - path and file name of content part of generating page
     * @param string $templateView - path and file name of template of generating page
     * @param variant $data - data for filling content part of page
     * 
     */
    function generate ( $contentView, $templateView, $data = null )
    {
        //include $templateView;
        $this->smarty->assign('contentView', $contentView);
        $this->smarty->assign('templateView', $templateView);
        $this->smarty->assign('data', $data);
        $this->smarty->assign('hostName', dirname ( filter_input (INPUT_SERVER, 'PHP_SELF' ) ) );
        $this->smarty->display($templateView);
    }
}