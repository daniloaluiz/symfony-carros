<?php

namespace Danilo\ProdutoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/produto")
 */
class ProdutoController extends Controller {

    /**
     * @Route("/", name="produto")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository("DaniloProdutoBundle:Produto");
        $produtos = $repo->findAll();
        return ['produtos' => $produtos];
    }

}
