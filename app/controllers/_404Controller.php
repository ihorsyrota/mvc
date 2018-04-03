<?php
/**
 * This is a handler for all bad requests
 * It shows a 404 Page
 *
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class _404Controller extends Controller
{
    function actionDefault ()
    {
        $this->view->generate ( 
                $this->config['dirs']['fp_views'] .  '_404View.php',

                $this->config['dirs']['fp_templates'] .  'template.tpl',
                
                '<h1>404 Not Found!<h1><br />' );
    }
}
