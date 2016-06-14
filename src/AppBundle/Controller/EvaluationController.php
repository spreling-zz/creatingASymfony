<?php
/**
 * Created by PhpStorm.
 * User: spreling
 * Date: 14-6-2016
 * Time: 15:55
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Evaluation;
use AppBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EvaluationController extends Controller
{
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
