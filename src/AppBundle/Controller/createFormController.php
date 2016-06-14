<?php
/**
 * Created by PhpStorm.
 * User: spreling
 * Date: 14-6-2016
 * Time: 12:16
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class createFormController extends Controller
{
    /**
     * @Route("/form")
     */
    public function showForm()
    {
        $html = $this->container->get('templating')->render(
            'main/main.html.twig',
            array(
                'questionBlocks' => ''
            )
        );
        return new Respone(
            $html
        );
    }
    
}
