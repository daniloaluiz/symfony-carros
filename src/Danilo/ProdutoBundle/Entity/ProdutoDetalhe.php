<?php

namespace Danilo\ProdutoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity() 
 */
class ProdutoDetalhe {

    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $id;
    /**
     * @ORM\Column(name="peso",type="decimal", precision=10, scale=1)
     */
    private $peso;
    /**
     * @ORM\Column(name="largura",type="decimal", precision=10, scale=1)
     */
    private $largura;
    /**
     * @ORM\Column(name="altura",type="decimal", precision=10, scale=1)
     */
    private $altura;
    
    public function getId() {
        return $this->id;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getLargura() {
        return $this->largura;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setLargura($largura) {
        $this->largura = $largura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }


}
