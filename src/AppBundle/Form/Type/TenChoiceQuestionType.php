<?php
/**
 * TenChoiceQuestionType.php
 *
 * This file contains the QuestionSetType class
 *
 * @package AppBundle\Controller
 */
namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/**
 * Class TenChoiceQuestionType - This class represents a form type for Ten Choice Question
 *
 * This Type is a form type used to build a form. It's used to build a question field
 * where the question has ten options to chooce from (for example a rating form 10 to 1)
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 1.0
 * @since 1.0
 * @copyright Spreling
 * @license MIT
 * @package AppBundle\Form\Type
 *
 */
class TenChoiceQuestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param OptionsResolver $resolver
     */
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
            'choice_attr' => function($val, $key, $index) {
                return ['class' => 'choiceTenQuestion_'.($key)];
            },
            'expanded' => true,
            'choice_label' => false,
            'choices_as_values' => true
        ));
    }

    /**
     * Return the parent form type which is the Choice Type
     * @return ChoiceType::class
     */
    public function getParent()
    {
        return ChoiceType::class;
    }

}
