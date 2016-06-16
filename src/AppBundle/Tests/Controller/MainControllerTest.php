<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Controller\MainController;
use ReflectionClass;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


/**
 * Class MainControllerTest
 *
 * @package AppBundle\Tests\Controller
 */
class MainControllerTest extends WebTestCase
{
/*    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertGreaterThan(
            0, $crawler->filter('div.table-striped-eva')->count());

    }*/

    public function testGetFirstEvaluation()
    {
        $object = new MainController();

        //$reflector = new ReflectionClass( 'AppBundle\Controller\MainController' );
        $method = $this->getPrivateMethod( 'AppBundle\Controller\MainController', 'getFirstEvaluation' );
        $test = new \ReflectionMethod('AppBundle\Controller\MainController', 'getFirstEvaluation');
        $test->setAccessible( true );

        $test->invoke($object);
        var_dump($test);
        var_dump($object);
    }

    public function getPrivateMethod( $className, $methodName ) {
        $reflector = new \ReflectionClass( $className );
        var_dump($reflector);
        $method = $reflector->getMethod( $methodName );
        $method->setAccessible( true );

        return $method;
    }
}
