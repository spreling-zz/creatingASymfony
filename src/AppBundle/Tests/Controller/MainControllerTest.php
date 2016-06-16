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
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertGreaterThan(
            0, $crawler->filter('div.table-striped-eva')->count());

    }
}
