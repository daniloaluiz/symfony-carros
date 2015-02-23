<?php
namespace Danilo\ProdutoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

class ProdutoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        $builder
                ->add('nome','text',['label'=>'Produto','required'=>true])
                ->add('descricao','textarea')
                ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
       $resolver->setDefaults(
               ['data_class'=>'Danilo\ProdutoBundle\Entity\Produto']
               );
    }

    public function getName() {
        return "danilo_produtobundle_produtotype";
    }

}
