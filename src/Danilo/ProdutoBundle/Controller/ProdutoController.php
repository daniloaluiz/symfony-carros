<?php

namespace Danilo\ProdutoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Danilo\ProdutoBundle\Entity\Produto;
use Danilo\ProdutoBundle\Form\ProdutoType;
use Danilo\ProdutoBundle\Service\ProdutoService;
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
       // $this->checkAutotizado();
        
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
    //    $this->checkAutotizado();
        $entity = new Produto();
        $form = $this->createForm(new ProdutoType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $produtoService = $this->get('danilo_produto.service.produto');
            $entity = $produtoService->insert($entity);

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
    public function editAction($id) {
   //      $this->checkAutotizado();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("DaniloProdutoBundle:Produto")->find($id);
        if (!$entity) {
            throw $this->createNotFoundException("Registro não encontrado");
        }
        $form = $this->createForm(new ProdutoType(), $entity);
        return [
            'entity' => $entity,
            'form' => $form->createView()
        ];
    }

    /**
     * @Route("/{id}/update/", name="produto_update")
     * @Template("DaniloProdutoBundle:Produto:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
     //    $this->checkAutotizado();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("DaniloProdutoBundle:Produto")->find($id);
        if (!$entity) {
            throw $this->createNotFoundException("Registro não encontrado");
        }
        $form = $this->createForm(new ProdutoType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
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
     * @Route("/{id}/delete/", name="produto_delete")
     * @Template()
     */
    public function deleteAction($id) 
    {
    //     $this->checkAutotizado();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("DaniloProdutoBundle:Produto")->find($id);
        if (!$entity) {
            throw $this->createNotFoundException("Registro não encontrado");
        }
        $em->remove($entity);
        $em->flush();
        
         return $this->redirect($this->generateUrl('produto'));
    }
    private function checkAutotizado(){
        $securityContext = $this->get('security.context');
        if(!$securityContext->isGranted('ROLE_ADMIN')){
            throw new AccessDeniedException('Somente Admin pode acessar aqui');
        }
    }
}
