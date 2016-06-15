<?php
/**
 * Result.php
 *
 * This file contains the Submission Model class
 *
 * @package AppBundle\Entity\submission
 */
namespace AppBundle\Entity\submission;

use AppBundle\Entity\Question;
use AppBundle\Entity\submission\Submission;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Submission - The Submission object Model
 *
 * The Model contains all the information related to a Submission. This model
 * is used to store the resuls of the evaluation in
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 1.5
 * @since 1.5
 * @copyright Spreling
 * @license MIT
 * @abstract This class renders the main page
 * @package AppBundle\Entity\submission
 *
 * @ORM\Entity
 * @ORM\Table(name="result")
 */

class Result
{
    /**
     * @var integer $id - unique identifier
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Submission - The parent Submission Object
     *
     * @ORM\ManyToOne(targetEntity="Submission", inversedBy="results")
     * @ORM\JoinColumn(name="submission_id", referencedColumnName="id")
     */
    private $submission;

    /**
     * @var Question - The parent Submission Object
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question", inversedBy="results")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    private $question;

    /**
     * @var integer - answer to the question
     *
     * @ORM\Column(name="answer", type="integer", length=3)
     */
    private $answer;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set answer
     *
     * @param integer $answer
     * @return Result
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return integer 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set submission
     *
     * @param \AppBundle\Entity\submission\Submission $submission
     * @return Result
     */
    public function setSubmission(\AppBundle\Entity\submission\Submission $submission = null)
    {
        $this->submission = $submission;

        return $this;
    }

    /**
     * Get submission
     *
     * @return \AppBundle\Entity\submission\Submission 
     */
    public function getSubmission()
    {
        return $this->submission;
    }

    /**
     * Set question
     *
     * @param \AppBundle\Entity\Question $question
     * @return Result
     */
    public function setQuestion(\AppBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \AppBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
