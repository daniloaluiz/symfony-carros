<?php

namespace Code\CarBundle\Service;

use Code\CarBundle\Entity\FabricanteInterface;
use Doctrine\ORM\EntityManagerInterface;

class FabricanteService {

    private $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function insert(FabricanteInterface $entity) {
        $em = $this->em;
        $em->persist($entity);
        $em->flush();
        
        return $entity;
    }
    
    public function delete(FabricanteInterface $entity) {
        $em = $this->em;
        $em->remove($entity);
        $em->flush();
        
        return $entity;
    }
    
}
