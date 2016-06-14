<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="anwser", type="int", length=2)
     */
    private $anwser;


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
     * Set anwser
     *
     * @param \int $anwser
     * @return Question
     */
    public function setAnwser($anwser)
    {
        $this->anwser = $anwser;

        return $this;
    }

    /**
     * Get anwser
     *
     * @return \int
     */
    public function getAnwser()
    {
        return $this->anwser;
    }
}
