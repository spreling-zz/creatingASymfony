<?php
/**
 * Created by PhpStorm.
 * User: spreling
 * Date: 16-6-2016
 * Time: 10:14
 */


namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EvaluationRepository extends EntityRepository
{
    public function getFirstEvaluation()
    {
        //Get evaluation data
        $eva = $this->findAll();
        /*@var Evaluation $evaluation */

        return array_pop($eva); //todo for now it uses the first evaluation it can find. Can do better.
    }
}
