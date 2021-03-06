<?php

namespace VuBa\Repository;

/**
 * ClickRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClickRepository extends \Doctrine\ORM\EntityRepository
{
    public function countClick()
    {
        return $this->createQueryBuilder('countclick')
            ->select('COUNT(countclick)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
