<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\CallbackTransformer;
use AppBundle\Entity\Proposition\MultipleChoice;
use AppBundle\Entity\Proposition\UniqueChoice;
use AppBundle\Entity\Proposition\Text;


class PropositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('text', TextType::class, [
            
        ])
        ->add('multipleChoice', MultipleChoiceType::class, [
            
        ])
        ->add('uniqueChoice', UniqueChoiceType::class, [
            
        ])
        ->addModelTransformer(new CallbackTransformer(
            function ($data) {
                $formatedData = [
                    "multipleChoice"=>[
                        "actif"=>false,
                        "choices"=>[]
                    ],
                    "uniqueChoice"=>[
                        "actif"=>false,
                        "choices"=>[]
                    ],
                    "text"=>[
                        "actif"=>false,
                        "format"=>""
                    ],
            ];
                if($data instanceof MultipleChoice ) {
                    $formatedData["multipleChoice"] ["actif"] = true;
                    $formatedData["multipleChoice"] ["choices"] = $data->getChoices();
                }
                else if($data instanceof UniqueChoice ) {
                    $formatedData["uniqueChoice"] ["actif"] = true;
                    $formatedData["uniqueChoice"] ["choices"] = $data->getChoices();
                }
                else if($data instanceof Text ) {
                    $formatedData["text"] ["actif"] = true;
                    $formatedData["text"] ["format"] = $data->getFormat();
                }
                return $formatedData;
            },
            function ($data) {
                if($data['multipleChoice']['actif']){
                    $multipleChoice = new MultipleChoice;
                    $multipleChoice->setChoices($data['multipleChoice']['choices']);
                    return $multipleChoice;
                }
                else if($data['text']['actif']) {
                   $text = new Text;
                   $text->setFormat($data['text']['format']);
                   return $text;
                }
                else if($data['uniqueChoice']['actif']) {
                    $uniqueChoice = new UniqueChoice;
                    $uniqueChoice->setChoices($data['uniqueChoice']['choices']);
                    return $uniqueChoice;
                }
                return null;
            }
            
        ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}