<?php

namespace Danilo\ProdutoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="categorias")
 * @ORM\Entity()
 */
class Categoria {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="nome",type="text",length=100)
     * @var string
     */
    private $nome;

    /**
     * @ORM\Column(name="descricao",type="text")
     * @var string
     */
    private $descricao;

    /**
     * @ORM\ManyToMany(targetEntity="Produto",inversedBy="categorias")
     * @ORM\JoinTable(name="categorias_produtos",
     *      joinColumns={@ORM\JoinColumn(name="categoria_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="produto_id", referencedColumnName="id")}
     *      )
     * */
    private $produtos;

    public function __construct() {
        $this->produtos = new ArrayCollection();
    }

    public function getProdutos() {
        return $this->produtos;
    }

    public function addProduto($produto) {
        $this->produtos[] = $produto;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}
