<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }
    
     /**
     * @Route("/run/{marca}/{modelo}", name="marca")
     */
    public function carroAction($marca,$modelo)
    {
        return $this->render('AppBundle:Default:carro.html.twig',['marca'=>$marca,'modelo'=>$modelo]);
    }
    
    
}
