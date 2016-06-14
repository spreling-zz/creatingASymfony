<?php
/**
 * Created by PhpStorm.
 * User: spreling
 * Date: 14-6-2016
 * Time: 13:05
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TenChoiceQuestionType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                '1' => 'horrible',
                '2' => 'terible',
                '3' => 'bad',
                '4' => 'a bit bad',
                '5' => 'could be better',
                '6' => 'quit well',
                '7' => 'good',
                '8' => 'verry good',
                '9' => 'best',
                '10' => 'amazing'
            ),
            'expanded' => true,
            'choice_label' => false,
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }

}
