<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use AppBundle\Entity\Proposition\UniqueChoice;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UniqueChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('actif', CheckboxType::class, [
            'label'    => 'UniqueChoice',
            'required' => false,
        ])
        ->add('choices', CollectionType::class, [                
                'entry_type' => ChoiceSelectType::class,
                'entry_options'  => array(
                    'required'  => false,
                ),
                'allow_add' => true,
                'label' =>"Choices"               
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' =>null,
        ]);
    }
}