<?php

namespace Tableless\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

//this below was added to make it[1] work.
//[1] : http://tableless.com.br/iniciando-com-symfony-2-parte-03/ 
use Symfony\Component\Form\Extension\Core\Type\DateTimeType as DateTimeType;

class PostType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('author')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tableless\ModelBundle\Entity\Post'
        ));
    }
}
