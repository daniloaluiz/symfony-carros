<?php

namespace Danilo\ProdutoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Danilo\ProdutoBundle\Entity\Produto;
use Danilo\ProdutoBundle\Form\ProdutoType;

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

    /**
     * @Route("/new/", name="produto_new")
     * @Template()
     */
    public function newAction() {
        $entity = new Produto();
        $form = $this->createForm(new ProdutoType(), $entity);
        return [
            'entity' => $entity,
            'form' => $form->createView()
        ];
    }

    /**
     * @Route("/create/", name="produto_create")
     * @Template("DaniloProdutoBundle:Produto:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Produto();
        $form = $this->createForm(new ProdutoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('produto'));
        }

        return [
            'entity' => $entity,
            'form' => $form->createView()
        ];
    }
    
    /**
     * @Route("/{id}/edit/", name="produto_edit")
     * @Template()
     */
    public function editAction($id)
    {
         $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("DaniloProdutoBundle:Produto")->find($id);
        if(!$entity){
            throw $this->createNotFoundException("Registro não encontrado");
        }
        $form = $this->createForm(new ProdutoType(), $entity);
        return [
            'entity' => $entity,
            'form' => $form->createView()
        ];
    }

}
