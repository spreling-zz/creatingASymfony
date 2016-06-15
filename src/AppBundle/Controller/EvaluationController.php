<?php
/**
 * EvaluationController.php
*
 * This file contains the EvaluationController class
 *
 * @package AppBundle\Controller
*/
namespace AppBundle\Controller;

use AppBundle\Entity\Evaluation;
use AppBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
/**
 * Class EvaluationController - The class repesents the REST API of the Evaluation model
 *
 * This controller is a REST API for the Evaluation model with it you can create read update
 * and delete evaluation out of the database
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 1.0
 * @since 1.0
 * @copyright Spreling
 * @license MIT
 * @abstract REST API of the Evaluation model
 * @package AppBundle\Controller
 *
 * @todo Create the update methode
 * @todo Create the read methode
 * @todo Create the delete methode
 */
class EvaluationController extends Controller
{
    /**
     * mockEvaluationAction - function create a mockup evaluation for testing
     *
     * This method create a mockup evaluation. It's meant for testing purposese. It contains
     * hardcoded question and will be the same everytime
     *
     * @access public
     * @since 1.0
     * @Route("/evaluation/mock")
     *
     * @return Response
     */
    public function mockEvaluationAction()
    {
        return $this->createEvaluationAction(array(
            'name' => 'evaluatie formulier',
            'questions' => array(
                'Ik sta sterker in mijn schoenen voor het examen door het volgen van deze training' => 10,
                'Ik heb mijn vakkennis vergroot door het volgen van deze training.' => 10,
                'Ik begrijp de stof beter door het volgen van deze training.' => 10,
                'Ik heb meer zelfvertrouwen gekregen door het volgen van deze training.' => 10,
                'Ik begin gemotiveerder aan het eindexamen door het volgen van deze training.' => 10,
            )
        ));
    }

    /**
     * createEvaluationAction - This is the create method of the REST API
     *
     * This method is the create part of the Evaluation REST API. It can be used through
     * post request to added new evaluation to the database
     *
     * @todo Change the create methode so it works by a standard post request
     *
     * @param mixed[] $evaluationBlob - an array of evaluation data
     * @return Response
     */
    public function createEvaluationAction($evaluationBlob)
    {
        $evaluation = new Evaluation();
        $evaluation->setName($evaluationBlob['name']);
        $em = $this->getDoctrine()->getManager();

        if (isset($evaluationBlob['questions'])) {
            foreach ($evaluationBlob['questions'] as $questionName => $questionType) {
                $question = new Question();
                $question->setEvaluation($evaluation);
                $question->setQuestion($questionName);
                $question->setAnwserType($questionType);

                $evaluation->addQuestion($question);
                $em->persist($question);
            }
        }

        $em->persist($evaluation);
        $em->flush();

        return new Response('Saved new product with id ' . $evaluation->getId());
    }
}
