<?php

namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Code\CarBundle\Form\FabricanteType;
use Code\CarBundle\Entity\Fabricante;

class FabricanteController extends Controller
{
    /**
     * @Route("/fabricantes",name="fabricante_index")
     * @Template()
     */
    public function indexAction()
    {
      $em = $this->getDoctrine()->getManager();
      $repo = $em->getRepository("CodeCarBundle:Fabricante");
      $fabricantes = $repo->findAll();
      return ['fabricantes' => $fabricantes];
    }

    /**
     * @Route("/fabricantes/new",name="fabricante_new")
     * @Template()
     */
    public function newAction()
    {
       $fabricante = new Fabricante();
        $form = $this->createForm(new FabricanteType(), $fabricante);
        return [
            'entity' => $fabricante,
            'form' => $form->createView()
        ]; 
        
    }
    /**
     * @Route("/fabricantes/create",name="fabricante_create")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $fabricante = new Fabricante();
        $form = $this->createForm(new FabricanteType(), $fabricante);
        $form->submit($request);
        
        if ($form->isValid()) {
            $fabricanteService = $this->get('code_car.service.fabricante');
            $fabricante = $fabricanteService->insert($fabricante);

            return $this->redirect($this->generateUrl('fabricante_index'));
        }
        
        return [
            'entity' => $fabricante,
            'form' => $form->createView()
        ];
        
    }
    /**
     * @Route("/fabricantes/{id}edit",name="fabricante_update")
     * @Template()
     */
    public function updateAction(Request $request, $id)
    {
        return array(
                // ...
            );    
        
    }
     /**
     * @Route("/fabricantes/{id}/edit",name="fabricante_edit")
     * @Template()
     */
    public function editAction($id)
    {
        return array(
                // ...
            );    
        
    }
     /**
     * @Route("/fabricantes/edit",name="fabricante_delete")
     * @Template()
     */
    public function deleteAction()
    {
        return array(
                // ...
            );    
        
    }
}
