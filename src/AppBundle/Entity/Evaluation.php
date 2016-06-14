<?php
/**
 * Created by PhpStorm.
 * User: spreling
 * Date: 14-6-2016
 * Time: 12:54
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Entity
 * @ORM\Table(name="evaluation")
 */
class Evaluation
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     *
     * @ORM\Column(type="integer")
     */
    private $questions;


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
     * Set name
     *
     * @param string $name
     * @return Evaluation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set questions
     *
     * @param integer $questions
     * @return Evaluation
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Get questions
     *
     * @return integer
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
