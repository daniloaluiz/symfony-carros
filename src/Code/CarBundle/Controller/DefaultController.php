<?php

namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CarBundle\Entity\Fabricante,
    Code\CarBundle\Entity\Carro;

class DefaultController extends Controller {

    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction() {
        /*$carros = [
            1 => ["marca" => "GM", "modelo" => "Corsa"],
            2 => ["marca" => "BMW", "modelo" => "Z3"],
            3 => ["marca" => "Alfa Romeo", "modelo" => "155 Super"],
            4 => ["marca" => "Citroen", "modelo" => "C4"],
            5 => ["marca" => "Chana", "modelo" => "Cargo Ce"],
            6 => ["marca" => "Aston Martin", "modelo" => "Vanquish"],
            7 => ["marca" => "Ferrari", "modelo" => "355 Gts"],
            8 => ["marca" => "Ford", "modelo" => "Mustang"],
            9 => ["marca" => "Porsche", "modelo" => "911 Carrera"],
            10 => ["marca" => "Fiat", "modelo" => "Bravo"],
            11 => ["marca" => "Ford", "modelo" => "Ka"],
        ];*/
        $em = $this->getDoctrine()->getManager();
         $repo = $em->getRepository("CodeCarBundle:Carro");
         $carros = $repo->findAll();
        return array('carros' => $carros);
    }
    
    /**
     * @Route("/popula")
     * @Template()
     */
    public function populaAction() {
        //popula 5 corros com seus fabricantes, basta descomentar flush
        $fabricante1 = new Fabricante();
        $fabricante1->setNome("GM");

        $fabricante2 = new Fabricante();
        $fabricante2->setNome("BMW");

        $fabricante3 = new Fabricante();
        $fabricante3->setNome("Ferrari");

        $fabricante4 = new Fabricante();
        $fabricante4->setNome("Ford");

        $fabricante5 = new Fabricante();
        $fabricante5->setNome("Fiat");

        $carro1 = new Carro();
        $carro1->setAno(2015);
        $carro1->setCor("Vermelho");
        $carro1->setModelo("Corsa");
        $carro1->setFabricante($fabricante1);

        $carro2 = new Carro();
        $carro2->setAno(2015);
        $carro2->setCor("Preto");
        $carro2->setModelo("Z3");
        $carro2->setFabricante($fabricante2);

        $carro3 = new Carro();
        $carro3->setAno(2015);
        $carro3->setCor("Amarelo");
        $carro3->setModelo("355 Gts");
        $carro3->setFabricante($fabricante3);

        $carro4 = new Carro();
        $carro4->setAno(2015);
        $carro4->setCor("Azul");
        $carro4->setModelo("Mustang");
        $carro4->setFabricante($fabricante4);

        $carro5 = new Carro();
        $carro5->setAno(2015);
        $carro5->setCor("Branco");
        $carro5->setModelo("Bravo");
        $carro5->setFabricante($fabricante5);

        $em = $this->getDoctrine()->getManager();

        $em->persist($fabricante1);
        $em->persist($fabricante2);
        $em->persist($fabricante3);
        $em->persist($fabricante4);
        $em->persist($fabricante5);
        
        $em->persist($carro1);
        $em->persist($carro2);
        $em->persist($carro3);
        $em->persist($carro4);
        $em->persist($carro5);
        
       // $em->flush();
        return [];
    }

}
