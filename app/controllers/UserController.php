<?php

class UserController extends Controller
{

    protected $data;

    function __construct ( $router, $config )
    {
        parent::__construct ( $router, $config );
        $this->model = new UserModel ( $config );
    }

    // Default page for user
    function actionDefault ()
    {
        if ( !$this->model->openedRequestsExist ( $this->config[ 'USER_LOGIN' ] ) )
        {
            // show request page
            $this->data = $this->model->getUserData ( $this->config[ 'USER_LOGIN' ] );
            $this->view->generate (
                    $this->config[ 'dirs' ][ 'fp_views' ] . 'User/RequestForm.php',
                    $this->config[ 'dirs' ][ 'fp_templates' ] . 'template.tpl',
                    $this->data
            );
        }
        else
        {
            //show statistics page
            $this->router->redirectTo ( 'user/stats' );
        }
    }

    // Handling request for USB unlocking
    function actionRequest ()
    {
        // If there are data field in HTTP request
        if ( isset ( $_POST[ 'ntlm' ] ) )
        {
            // then Write request to database
            $data = array (
                'period'        => $_POST[ 'period' ],
                'foType'        => $_POST[ 'foType' ],
                'ntlm'          => $_POST[ 'ntlm' ],
                'user_name'     => $_POST[ 'user_name' ],
                'reason'        => $_POST[ 'reason' ],
                'ip_address'    => $_POST[ 'ip_address' ],
                'computer_name' => $_POST[ 'computer_name' ],
                'st1'           => 1,
                'chk'           => 'OMisch1',
                'mchk'          => 'IKonon1',
                'rtype'         => 1
            );
            $this->model->insertRequest ( $data );
            $this->view->generate (
                    $this->config[ 'dirs' ][ 'fp_views' ] . 'User/RequestConfirmation.php',
                    $this->config[ 'dirs' ][ 'fp_templates' ] . 'template.tpl'
            );
        }
        else
        {
            // else show request page
            $this->router->redirectTo ( 'user/view' );
        }
    }

    // Request processing info page
    function actionStats ()
    {
        // If there is opened request
        if ( $this->model->openedRequestsExist ( $this->config[ 'USER_LOGIN' ] ) )
        {
            //then show statistics page
            unset ( $this->data );
            $this->data = $this->model->getOpenedRequests ( $this->config[ 'USER_LOGIN' ] );
            $this->view->generate (
                    $this->config[ 'dirs' ][ 'fp_views' ] . 'User/OpenedRequests.php',
                    $this->config[ 'dirs' ][ 'fp_templates' ] . 'template.tpl',
                    $this->data
            );
        }
        else
        {
            // else show request page
            $this->router->redirectTo ( 'user/view' );
        }
    }

    // Request processing request details page
    function actionDetail ( $id )
    {
        unset ( $this->data );

        // If specified request exists
        if ( $this->data = $this->model->getRequestDetails ( intval ( $id[ 0 ] ) ) )
        {
            //then show statistics page
            $this->view->generate (
                    $this->config[ 'dirs' ][ 'fp_views' ] . 'User/RequestDetails.php',
                    $this->config[ 'dirs' ][ 'fp_templates' ] . 'template.tpl',
                    $this->data
            );
        }
        else
        {
            $this->router->redirectTo ( $this->config[ '404' ] );
        }
    }

}
