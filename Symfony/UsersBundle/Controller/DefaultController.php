<?php
namespace UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsersBundle:Default:index.html.twig');
    }
    public function cuentasAction(){
    	$resultado = $this->get('srv_Operaciones');
    	$r=$resultado->suma(2.48, 2.49);
    	return new Response($r);
    }
}
