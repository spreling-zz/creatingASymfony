<?php
/**
 * SubmissionController.php
 *
 * This file contains the SubmissionController class
 *
 * @package AppBundle\Controller
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Question;
use AppBundle\Entity\submission\Result;
use AppBundle\Entity\submission\User;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\submission\Submission;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SubmissionController - The class repesents the REST API of the Submission model
 *
 * This controller is a REST API for the Submission model with it you can create read update
 * and delete Submissions out of the database
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
 * @todo Create the create methode
 */
class SubmissionController extends Controller
{
    public function createSubmissionAction($clientIp, $formData, $evaluation)
    {
        $submission = new Submission();
        $em = $this->getDoctrine()->getManager();

        //Ik wou hier een methode toevoegen in de Repository maar dat is niet gelukt vandaar dat het hier handmatig onderstaat
        //$this->getDoctrine()
        //    ->getRepository('AppBundle:submission\User')
        //   ->findUserByIpIfExist($clientIp);

        $user = $this->getDoctrine()
            ->getRepository('AppBundle:submission\User')
            ->findOneBy(array('ipAdress' => str_replace('.', '', $clientIp)));

        if ($user === null) {
            $user = new User();
            $user->setSubmission($submission)
                ->setIpAdress(str_replace('.', '', $clientIp))
                ->setHash('randomShit'); //todo dunno why the hash field exist dont think its needed.
            $em->persist($user);


            $results = new ArrayCollection();
            foreach ($formData as $questionId => $questionResult) {
                $result = new Result();
                $result->setAnswer($questionResult)
                    ->setQuestion(
                        $this->getDoctrine()
                            ->getRepository('AppBundle:Question')
                            ->find($questionId)
                    )
                    ->setSubmission($submission);

                $results->add($result);
                $em->persist($result);
            }

            $submission
                ->setEvaluation($evaluation)
                ->setUser($user)
                ->setResults($results->toArray());

            $em->persist($submission);
            $em->flush();

            $response = new Response($this->container->get('templating')->render(
                'evaluation/submission.html.twig',
                array (
                    'message' => 'Bedankt voor het delen van deze gegevens. We gaan er absolute niks mee doen. Dit is een voorbeeld applicatie gemaakt
                                     voor anderen. Weet niet hoe je aan deze code komt maar deze evaluatie is in iedergeval niet nuttig :P '
                )
            ));
        } else {
            $response = new Response($this->container->get('templating')->render(
                'evaluation/submission.html.twig',
                array (
                    'message' => 'Je hebt de eveluatie al ingevuld. Het is de bedoeling dat je deze evaluatie niet 100x vol spam. Ik hou je goed in de gaten.'
                )
            ));
        }
        return $response;
    }

}
