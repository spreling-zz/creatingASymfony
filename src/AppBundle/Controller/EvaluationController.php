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
    public function mockEvaluationAction(){
        return $this->createEvaluationAction(array(
            'name' => 'evaluatie formulier',
            'questions' => array(
                'vraag 1' => 10,
                'vraag 2' => 10,
                'vraag 3' => 10,
                'vraag 4' => 10,
                'vraag 5' => 10,
            )
        ));
    }
    public function createEvaluationAction($evaluationBlob)
    {
        $evaluation = new Evaluation();
        $evaluation->setName($evaluationBlob['name']);
        $em = $this->getDoctrine()->getManager();

        if (isset($evaluationBlob['questions'])){
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

        return new Response('Saved new product with id '.$evaluation->getId());
    }
}
