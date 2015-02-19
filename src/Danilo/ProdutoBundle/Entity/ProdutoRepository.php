<?php

namespace Danilo\ProdutoBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProdutoRepository extends EntityRepository {

    public function getProdutosMaiorQue($num) {
        /* $dql = "SELECT p FROM DaniloProdutoBundle:Produto p WHERE p.id > :num ";
          return $this->getEntityManager()
          ->createQuery($dql)
          ->setParameter(":num", $num)
          ->getResult(); */

        return $this->createQueryBuilder("p")
                        ->where("p.id > :num")
                        ->setParameter(":num", $num)
                        ->getQuery()
                        ->getResult();
    }

}
