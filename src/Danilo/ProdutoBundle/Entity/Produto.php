<?php

namespace Danilo\ProdutoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Danilo\ProdutoBundle\Entity\ProdutoRepository") 
 */
class Produto 
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $id;
    /**
     * @ORM\Column(name="nome",type="text",length=255)
     * @var string
     */
    private $nome;
    /**
     * @ORM\Column(name="descricao",type="text")
     * @var string
     */
    private $descricao;

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}
