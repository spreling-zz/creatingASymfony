<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    /**
     * @Route("/")
     */
    public function showAction()
    {
        $number = rand(0, 300);

        $html = $this->container->get('templating')->render(
            'main/main.html.twig',
            array(
                'name' => 'harm jacob'
            )
        );

        return new Response(
            $html
        );
    }
}
