<?php
/**
 * Created by PhpStorm.
 * User: spreling
 * Date: 16-6-2016
 * Time: 11:28
 */

namespace Tests\AppBundle\Entity\submission;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }
    public function testCreateNewUser()
    {
        //todo Make it :P Only im not so user that creating a user should be in the repostitory section
    }

    public function testFindUserByIpIfExist()
    {
       //todo Make it :P

    }
    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null; // avoid memory leaks
    }
}
