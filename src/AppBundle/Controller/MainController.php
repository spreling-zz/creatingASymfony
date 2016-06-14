<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Evaluation;
use AppBundle\Form\Type\TenChoiceQuestionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    /**
     * @Route("/")
     */
    public function showAction()
    {
        $evaluation = $this->getDoctrine()
            ->getRepository('AppBundle:Evaluation')
            ->find(9);

        $questions = $evaluation->getQuestions();

        dump($evaluation);

        $evaluation = new Evaluation();
        $evaluation->setQuestions($questions);


        /*Ik heb geprobberd het formulier middels het active record systeem van symfony te genereren maar dat is
        niet gelukt. Niet in deze korte tijd. De regel hieronder werkt alleen precies andersom. inplaats van het weergeven
        van de vragen met de antwoordveld. kan je de vragen zelf aanpassen. voor nu heb ik daarom een handmatig formulier
        gebouwd.
        */
        //$form = $this->createForm(QuestionSetType::class, $evaluation);

        $form = $this->createFormBuilder();

        foreach ($questions as $question) {
            $form->add('selfQuestions_' . $question->getId(),
                TenChoiceQuestionType::class, array(
                    'label' => $question->getQuestion()
                ));
        }
        $form = $form->add('send', SubmitType::class)
            ->getForm();

        $html = $this->container->get('templating')->render(
            'main/main.html.twig',
            array(
                'form' => $form->createView()
            )
        );

        return new Response(
            $html
        );
    }
}
