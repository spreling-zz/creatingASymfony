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
     * showAction - function which generator the main page
     *
     * This method is the default methode which is used when visiting the main page.
     *
     * @access public
     * @since 1.0
     * @Route("/")
     */
    public function showAction()
    {
        //Get evaluation data
        $evaluation = $this->getDoctrine()
            ->getRepository('AppBundle:Evaluation')
            ->find(9); //todo for now it uses a fixed evaluation number

        //Get question which are associated with the evaluation
        $questions = $evaluation->getQuestions();



        /*
        * Ik heb geprobberd het formulier middels het active record systeem van symfony te genereren maar dat is
        * niet gelukt. Niet in deze korte tijd. De regel hieronder werkt alleen precies andersom. inplaats van het weergeven
        * van de vragen met de antwoordveld. kan je de vragen zelf aanpassen. voor nu heb ik daarom een handmatig formulier
        * gebouwd.
        */
        //$evaluation = new Evaluation();
        //$evaluation->setQuestions($questions);
        //$form = $this->createForm(QuestionSetType::class, $evaluation);


        //manual form building
        $form = $this->createFormBuilder();

        //inserting questions for the database in the form
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
