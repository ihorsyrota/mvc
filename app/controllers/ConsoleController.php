<?php

class ConsoleController extends Controller
{

    protected $data;

    function __construct ( $router, $config )
    {
        parent::__construct ( $router, $config );
        $this->model = new ConsoleModel ( $config );
    }

    function actionView ()
    {
        $this->data = $this->model->getData ();

        $this->view->generate (
                $this->config[ 'dirs' ][ 'fp_views' ] . 'Console/ConsoleView.php',
                $this->config[ 'dirs' ][ 'fp_templates' ] . 'Console/template.tpl',
                $this->data );
    }

}
