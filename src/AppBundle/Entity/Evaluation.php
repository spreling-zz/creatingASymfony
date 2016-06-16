<?php
/**
 * Evaluation.php
 *
 * This file contains the Evaluation Model class
 *
 * @package AppBundle\Entity
 */
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Evaluation - The Evaluation object Model
 *
 * The Model contains all the information related to a evaluation. This model
 * is used to generated a evaluation form
 *
 * @author Spreling - Harm Jacob Drijfhout Email: Spreling@gmail.com
 * @version 1.0
 * @since 1.0
 * @copyright Spreling
 * @license MIT
 * @abstract This class renders the main page
 * @package AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="evaluation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvaluationRepository")
 */
class Evaluation
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
     * @var string $name - the name of the evaluation
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @var ArrayCollection<Result> - Collection of submission
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\submission\Submission", mappedBy="evaluation")
     */
    private $submissions;
    /**
     * @var ArrayCollection<Question> $questions - collection of questions belonging to the evaluation
     * @ORM\OneToMany(targetEntity="Question", mappedBy="evaluation")
     */
    private $questions;

    /**
     * __construct - function to construct the class
     *
     * Constructor function for this class. It creates a empty ArrayCollection for the Question collection
     *
     * @name __construct
     */
    public function __construct()
    {
        $this->questions = new ArrayCollection();
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
     * setName - Setter for name
     *
     * Setter to set the name variable
     *
     * @param string $name
     * @return Evaluation - Self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * getName - Getter for name
     *
     * Getter to get the name variable
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * getQuestions - Getter for the questions collection
     *
     * Getter to get the collection of Question Objects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * setQuestion - Setter for Question
     *
     * Setter to set the Question variable with a new set of Questions
     *
     * @param ArrayCollection<Question> $Question
     * @return Evaluation - Self
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;
        return $this;
    }

    /**
     * addQuestion - Add method to add one Question
     *
     * Add method to add one Question to the Questions collection
     *
     * @param \AppBundle\Entity\Question $questions
     * @return Evaluation - Self
     */
    public function addQuestion(\AppBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * removeQuestions - Remove method to remove one Question
     *
     * Remove method to remove one Question form the Question collection
     *
     * @param \AppBundle\Entity\Question $questions
     * @return Evaluation - self
     */
    public function removeQuestion(\AppBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);

        return $this;
    }

    /**
     * addSubmission - Add method to add one Submission
     *
     * Add method to add one Submission to the Submission collection
     *
     * @param \AppBundle\Entity\submission\Submission $submissions
     * @return Evaluation
     */
    public function addSubmission(\AppBundle\Entity\submission\Submission $submissions)
    {
        $this->submissions[] = $submissions;

        return $this;
    }

    /**
     * removeSubmission - Remove method to remove one Submission
     *
     * Remove method to remove one Submission form the Submission collection
     *
     * @param \AppBundle\Entity\submission\Submission $submissions
     */
    public function removeSubmission(\AppBundle\Entity\submission\Submission $submissions)
    {
        $this->submissions->removeElement($submissions);
    }

    /**
     * getSubmissions - Getter for Submission
     *
     * Getter to get the Submission variable
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubmissions()
    {
        return $this->submissions;
    }
}
