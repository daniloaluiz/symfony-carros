<?php

namespace Code\CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fabricante
 *
 * @ORM\Table("fabricante")
 * @ORM\Entity
 */
class Fabricante implements FabricanteInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=150)
     */
    private $nome;

    /**
    * @ORM\OneToMany(targetEntity="Code\CarBundle\Entity\Carro", mappedBy="fabricante", orphanRemoval=true)
    **/
    protected $carros;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Fabricante
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }
    
    public function getCarros() {
        return $this->carros;
    }

    public function setCarros($carros) {
        $this->carros = $carros;
    }


}
