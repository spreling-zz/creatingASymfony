<?php
/**
 * SubmissionController.php
 *
 * This file contains the SubmissionController class
 *
 * @package AppBundle\Controller
 */

namespace AppBundle\Controller;

use AppBundle\Entity\submission\Submission;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
    public function createSubmissionAction(Request $submission)
    {
        
        $submission = new Submission();

    }
}
