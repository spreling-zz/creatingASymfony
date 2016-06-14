<?php
/**
 * Created by PhpStorm.
 * User: spreling
 * Date: 14-6-2016
 * Time: 09:56
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController
{
    /**
     * @Route();
     */
    public function numberAction()
    {
        $number = rand(0, 300);

        return new Response(
            '-'.$number.'-'
        );
    }
}
