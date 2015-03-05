<?php

namespace Danilo\ProdutoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Danilo\ProdutoBundle\Entity\Produto;
use Danilo\ProdutoBundle\Entity\ProdutoDetalhe;
use Danilo\ProdutoBundle\Entity\Categoria;

class DefaultController extends Controller {

    /**
     * @Route("/produtosx/")
     * @Template()
     */
    public function indexAction() {
        return [];
    }

    /**
     * @Route("/doctrine")
     * @Template()
     */
    public function testeAction() {
        $categoria = new Categoria();
        $categoria->setNome("Informática");
        $categoria->setDescricao("Tudo sobre informática");

        $categoria2 = new Categoria();
        $categoria2->setNome("Eletrônicos");
        $categoria2->setDescricao("Tudo sobre eletrônicos");

        $produto = new Produto();
        $produto->setNome("Notebook A");
        $produto->setDescricao("Descrição do Notebook A");
        $produto->addCategoria($categoria);
        $produto->addCategoria($categoria2);

//        $produtoDetalhe = new ProdutoDetalhe();
//        $produtoDetalhe->setPeso(11);
//        $produtoDetalhe->setAltura(21);
//        $produtoDetalhe->setLargura(3);

    //    $produto->setDetalhe($produtoDetalhe);

        $em = $this->getDoctrine()->getManager();

        $em->persist($categoria);
        $em->persist($categoria2);
 //       $em->persist($produtoDetalhe);
        $em->persist($produto);
        $em->flush();
        
        $repo = $em->getRepository("DaniloProdutoBundle:Produto");
        //$repo = $em->getRepository("DaniloProdutoBundle:Categoria");
        // $produtos = $repo->getProdutosMaiorQue(1);
        //$categoria = $repo->find(1);
         $produtos = $repo->findAll();
          return ['produtos' => $produtos];
        //return ['categoria' => $categoria];
    }

}
