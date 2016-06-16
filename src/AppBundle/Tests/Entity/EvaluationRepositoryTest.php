<?php
/**
 * Created by PhpStorm.
 * User: spreling
 * Date: 16-6-2016
 * Time: 10:45
 */

namespace Tests\AppBundle\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EvaluationRepositoryTest extends KernelTestCase
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

    public function testGetFirstEvaluation()
    {
        $manualResult = $this->em
            ->createQuery(
            'SELECT E.id
            FROM AppBundle:Evaluation E')
            ->setMaxResults(1)
            ->getOneOrNullResult();

        $methodResult = $this->em
            ->getRepository('AppBundle:Evaluation')
            ->getFirstEvaluation()
            ->getId();

        if (empty($manualResult)){
            $this->fail();
        } else {
            $this->assertEquals($methodResult, $manualResult['id']);
        }

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
