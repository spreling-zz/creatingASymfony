<?php
/**
 * QuestionSetType.php
 *
 * This file contains the QuestionSetType class
 *
 * @package AppBundle\Controller
 */
namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/**
 * Class QuestionSetType - This class represents a form type for QuestionSet
 *
 * This Type is a form type used to build a form. It's used to build a set of question
 * field for the evaluation
 * 
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 1.0
 * @since 1.0
 * @copyright Spreling
 * @license MIT
 * @todo make it actual work. At the moment i'm able to edit the question themselfs
 * @package AppBundle\Form\Type
 *
 */
class QuestionSetType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('questions', CollectionType::class, array(
            'label' => 'question block',
            'entry_type' => QuestionType::class
        ));

    }

    /**
     * {@inheritdoc}
     * 
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Evaluation'
        ));
    }
}
