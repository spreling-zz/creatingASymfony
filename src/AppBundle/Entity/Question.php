<?php
/**
 * Question.php
 *
 * This file contains the Question Model class
 *
 * @package AppBundle\Entity
 */
namespace AppBundle\Entity;

use AppBundle\Entity\submission\Result;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Question - The Question object Model
 *
 * The Model contains all the information related to a question. This model
 * is used by the Evaluation model in a one-to-many relation
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 1.0
 * @since 1.0
 * @copyright Spreling
 * @license MIT
 * @abstract This class renders the main page
 * @package AppBundle\Entity
 *
 * @see Evaluation
 *
 * @ORM\Entity
 * @ORM\Table(name="question")
 */
class Question
{
    /**
     * @var integer $id - unique identifier
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $question - the text of the question
     *
     * @ORM\Column(name="question", type="string", length=255)
     */
    private $question;

    /**
     * @var integer $answerType - the Type of awnser related to the question
     *
     * @ORM\Column(name="answerType", type="integer", length=2)
     */
    private $answerType;

    /**
     * @var Evaluation - The parent Evaluation Object
     *
     * @ORM\ManyToOne(targetEntity="Evaluation", inversedBy="questions")
     * @ORM\JoinColumn(name="evaluation_id", referencedColumnName="id")
     */
    private $evaluation;

    /**
     * @var Result $results - collection of results about this specific question
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\submission\Result", mappedBy="question")
     */
    private $results;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->results = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * getId - Getter for id
     *
     * Getter to get the unique identifier variable
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * setAnswerType - Setter for answerType
     *
     * Setter to set the answerType variable
     *
     * @param integer $answerType
     * @return Question
     */
    public function setAnswerType($answerType)
    {
        $this->answerType = $answerType;

        return $this;
    }

    /**
     * getAnswerType - Getter for answerType
     *
     * Getter to get the answerType variable
     *
     * @return integer
     */
    public function getAnswerType()
    {
        return $this->answerType;
    }

    /**
     * setQuestion - Setter for question
     *
     * Setter to set the question variable
     *
     * @param string $question
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * getQuestion - Getter for question
     *
     * Getter to get the question variable
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * setEvaluation - Setter to set the parent Evaluation
     *
     * Setter to set the parent Evaluation
     *
     * @param \AppBundle\Entity\Evaluation $evaluation
     * @return Question
     */
    public function setEvaluation(\AppBundle\Entity\Evaluation $evaluation = null)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * getEvaluation - Getter to get the parent Evaluation
     *
     * Getter to get the parent Evaluation
     *
     * @return \AppBundle\Entity\Evaluation
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * addResults - Add method to add one result
     *
     * Add method to add one Result to the Result collection
     *
     * @param \AppBundle\Entity\submission\Result $results
     * @return Question
     */
    public function addResult(\AppBundle\Entity\submission\Result $results)
    {
        $this->results[] = $results;

        return $this;
    }

    /**
     * removeResult - Remove method to remove one Result
     *
     * Remove method to remove one Result form the Result collection
     *
     * @param \AppBundle\Entity\submission\Result $results
     */
    public function removeResult(\AppBundle\Entity\submission\Result $results)
    {
        $this->results->removeElement($results);
    }

    /**
     * getResults - Getter for the Result collection
     *
     * Getter to get the collection of Result Objects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResults()
    {
        return $this->results;
    }
}
