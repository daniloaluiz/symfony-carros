<?php

namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $carros = [
            1 =>["marca"=>"GM","modelo"=>"Corsa"],
            2 =>["marca"=>"BMW","modelo"=>"Z3"],
            3 =>["marca"=>"Alfa Romeo","modelo"=>"155 Super"],
            4 =>["marca"=>"Citroen","modelo"=>"C4"],
            5 =>["marca"=>"Chana","modelo"=>"Cargo Ce"],
            6 =>["marca"=>"Aston Martin","modelo"=>"Vanquish"],
            7 =>["marca"=>"Ferrari","modelo"=>"355 Gts"],
            8 =>["marca"=>"Ford","modelo"=>"Mustang"],
            9 =>["marca"=>"Porsche","modelo"=>"911 Carrera"],
            10 =>["marca"=>"Fiat","modelo"=>"Bravo"],
            11 =>["marca"=>"Ford","modelo"=>"Ka"],
            ];
        return array('carros' => $carros);
    }
}
