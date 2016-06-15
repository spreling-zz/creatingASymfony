<?php
/**
 * Question.php
 *
 * This file contains the Question Model class
 *
 * @package AppBundle\Entity
 */
namespace AppBundle\Entity;

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
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
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
     * @var int $anwserType - the Type of awnser related to the question
     *
     * @ORM\Column(name="anwserType", type="integer", length=2)
     */
    private $anwserType;

    /**
     * @var Evaluation - The parent Evaluation Object
     *
     * @ORM\ManyToOne(targetEntity="Evaluation", inversedBy="questions")
     * @ORM\JoinColumn(name="evaluation_id", referencedColumnName="id")
     */
    private $evaluation;

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
     * setAnwserType - Setter for AnwserType
     *
     * Setter to set the AnwserType variable
     *
     * @param integer $anwserType
     * @return Question
     */
    public function setAnwserType($anwserType)
    {
        $this->anwserType = $anwserType;

        return $this;
    }

    /**
     * getAnwserType - Getter for anwserType
     *
     * Getter to get the name variable
     *
     * @return integer
     */
    public function getAnwserType()
    {
        return $this->anwserType;
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
}
