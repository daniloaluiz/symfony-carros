<?php

namespace Danilo\ProdutoBundle\Service;

use Danilo\ProdutoBundle\Entity\ProdutoInterface;
use Doctrine\ORM\EntityManagerInterface;

class ProdutoService {

    private $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function insert(ProdutoInterface $entity) {
        $em = $this->em;
        $em->persist($entity);
        $em->flush();
        
        return $entity;
    }

}
