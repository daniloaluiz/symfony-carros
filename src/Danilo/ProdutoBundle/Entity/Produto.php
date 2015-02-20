<?php

namespace Danilo\ProdutoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Danilo\ProdutoBundle\Entity\ProdutoRepository") 
 */
class Produto {

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

    /**
     * @ORM\OneToOne(targetEntity="ProdutoDetalhe")
     * @ORM\JoinColumn(name="produto_detalhe_id", referencedColumnName="id")
     */
    private $detalhe;

    /**
     * @ORM\ManyToMany(targetEntity="Categoria",mappedBy="produtos")
     * */
    private $categorias;

    public function __construct() {
        $this->categorias = new ArrayCollection();
    }

    public function getCategorias() {
        return $this->categorias;
    }

    public function addCategoria($categoria) {
        $this->categorias[] = $categoria;
    }

    public function getDetalhe() {
        return $this->detalhe;
    }

    public function setDetalhe($detalhe) {
        $this->detalhe = $detalhe;
    }

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
