<?php
/**
 * Result.php
 *
 * This file contains the User Model class
 *
 * @package AppBundle\Entity\submission
 */

namespace AppBundle\Entity\submission;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Submission - The User object Model
 *
 * The Model contains all the information related to a Submission. This model
 * is used to identify the submission applient. (stom woord)
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
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\submission\UserRepository")
 */
class User
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
     * @var string $hash - unique hash
     *
     * @ORM\Column(name="hash", type="string", length=255)
     */
    private $hash;
    /**
     * @var int $ipAddress - the ip address of the applient
     *
     * @ORM\Column(name="ip_address", type="integer", length=12)
     */
    private $ipAdress;
    /**
     * @var Submission - users submission
     *
     * @ORM\OneToOne(targetEntity="Submission")
     * @ORM\JoinColumn(name="submission_id", referencedColumnName="id")
     */
    private $submission;

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
     * Set hash
     *
     * @param string $hash
     * @return User
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set ipAdress
     *
     * @param integer $ipAdress
     * @return User
     */
    public function setIpAdress($ipAdress)
    {
        $this->ipAdress = $ipAdress;

        return $this;
    }

    /**
     * Get ipAdress
     *
     * @return integer
     */
    public function getIpAdress()
    {
        return $this->ipAdress;
    }

    /**
     * Set submission
     *
     * @param \AppBundle\Entity\submission\Submission $submission
     * @return User
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
}
