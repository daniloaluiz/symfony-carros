<?php

namespace Danilo\ProdutoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Danilo\ProdutoBundle\Entity\Produto;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction($name)
    {
        return ['name' => $name];
    }
    
    /**
     * @Route("/doctrine")
     * @Template()
     */
    public function testeAction()
    {
        $produto = new Produto();
        $produto->setNome("Notebook B");
        $produto->setDescricao("Descrição do Notebook B");
        
        $em = $this->getDoctrine()->getManager();
        
       // $em->persist($produto);
        //$em->flush();
        $repo = $em->getRepository("DaniloProdutoBundle:Produto");
        $produtos = $repo->getProdutosMaiorQue(1);
        return ['produtos'=>$produtos];
        
    }
}
