<?php

class RequestController extends Controller
{

    protected $data;

    function __construct ( $router, $config )
    {
        parent::__construct ( $router, $config );
        $this->model = new RequestModel ( $config );
    }

    // Request processing request details page
    function actionDetail ( $params )
    {
        unset ( $this->data );

        // If specified request exists
        if ( $this->data = $this->model->getRequestDetails ( intval ( $params[ 1 ] ) ) )
        {
            $this->data[ 'goBack' ] = '/' . $params[ 0 ];
            //then show statistics page
            $this->view->generate (
                    $this->config[ 'dirs' ][ 'fp_views' ] . 'Request/RequestDetails.php',
                    $this->config[ 'dirs' ][ 'fp_templates' ] . 'request/template.tpl',
                    $this->data
            );
        }
        else
        {
            $this->router->redirectTo ( $this->config[ '404' ] );
        }
    }

}
