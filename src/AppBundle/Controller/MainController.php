<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Evaluation;

use AppBundle\Form\Type\TenChoiceQuestionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    /**
     * @Route("/")
     */
    public function showAction()
    {
        $evaluationController = new EvaluationController();


        $evaluation = new Evaluation();
        $form = $this->createFormBuilder($evaluation)
            ->add('name', TextType::class)
/*
        for ($i=0; $i<= 10; $i++){
            $form->add('selfQuestions_'.$i, TenChoiceQuestionType::class, array(
                'label' => 'Dit is de vraag',
            ));
        }*/


            ->add('save', SubmitType::class, array('label' => 'Create Eva'))
            ->getForm();
        //$form = $this->createForm(Evaluation::class, $evaluation);

        $html = $this->container->get('templating')->render(
            'main/main.html.twig',
            array(
                'name' => 'harm jacob',
                'form' => $form->createView()
            )
        );

        return new Response(
            $html
        );
    }
}
