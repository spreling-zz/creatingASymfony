<?php
/**
 * Submission.php
 *
 * This file contains the Submission Model class
 *
 * @package AppBundle\Entity
 */
namespace AppBundle\Entity\submission;

use AppBundle\Entity\Evaluation;
use AppBundle\Entity\submission\User;
use AppBundle\Entity\submission\Result;
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
 * @package AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="submission")
 */
class Submission
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
     * @var Evaluation - The linked Evaluation Object
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Evaluation", inversedBy="submissions")
     * @ORM\JoinColumn(name="evaluation_id", referencedColumnName="id")
     */
    private $evaluation;
    /**
     * @var User - The owner User Object
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    /**
     * @var ArrayCollection<Result> - Collection of results belonging to the submission
     * @ORM\OneToMany(targetEntity="Result", mappedBy="submission")
     */
    private $results;

    /**
     * __construct - function to construct the class
     *
     * Constructor function for this class. It creates a empty ArrayCollection for the results collection
     *
     * @name __construct
     */
    public function __construct()
    {
        $this->results = new ArrayCollection();
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
     * SetEvaluation
     *
     * Setter to set the Evaluation variable
     *
     * @param \AppBundle\Entity\Evaluation $evaluation
     * @return Submission
     */
    public function setEvaluation(\AppBundle\Entity\Evaluation $evaluation = null)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * getEvaluation - Getter for Evaluation
     *
     * Getter to get the Evaluation variable
     *
     * @return \AppBundle\Entity\Evaluation
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * setUser - Setter for User
     *
     * Setter to set the User variable
     *
     * @param \AppBundle\Entity\submission\User $user
     * @return Submission
     */
    public function setUser(\AppBundle\Entity\submission\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * getUser - Getter for User
     *
     * Getter to get the User variable
     *
     * @return \AppBundle\Entity\submission\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * setResults - Setter for Results
     *
     * Setter to set the Results variable with a new set of Results
     *
     * @param ArrayCollection<Result> $results
     * @return Submission - Self
     */
    public function setResults($results)
    {
        $this->results = $results;

        return $this;
    }

    /**
     * addResult - Add method to add one Result
     *
     * Add method to add one Result to the Result collection
     *
     * @param \AppBundle\Entity\submission\Result $results
     * @return Submission - Self
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
     * getResults - Getter for Result
     *
     * Getter to get the Result variable
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResults()
    {
        return $this->results;
    }
}
