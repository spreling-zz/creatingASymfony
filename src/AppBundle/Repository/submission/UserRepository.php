<?php
/**
 * Created by PhpStorm.
 * User: spreling
 * Date: 15-6-2016
 * Time: 21:18
 */

namespace AppBundle\Repository\submission;

use AppBundle\Entity\submission\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class UserRepository extends EntityRepository
{
    public function findUserByIpIfExist($ip, $submission)
    {
        $user = $this->findOneBy(array('ipAdress' => str_replace('.', '', $ip)));


        if ($user === null) {
            return false;
        }
        return $user;


    }

    public function createNewUser($ip, $submission)
    {

        $user = new User();
        $user->setSubmission($submission)
            ->setIpAdress(str_replace('.', '', $ip))
            ->setHash('randomShit'); //todo dunno why the hash field exist dont think its needed.

        return $user;
    }
}
