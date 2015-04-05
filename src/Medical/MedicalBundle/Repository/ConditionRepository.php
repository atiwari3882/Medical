<?php

namespace Medical\MedicalBundle\Repository;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;

class ConditionRepository extends EntityRepository
{
    /**
     * GET billing data according to params
     * @param array $params
     * @return Billing
     */
    public function getElements(array $params = [])
    {
        $q = $this->createQueryBuilder('c');
        $this->getByParamsForQuery($q, $params);

        return $q;
    }

    /**
     * APPLY filter by given params
     * @param $q
     * @param $params
     */
    private function getByParamsForQuery(QueryBuilder $q, $params)
    {
        // GET by user
        if (array_key_exists('by_user', $params)) {
            $q->andWhere($q->expr()->eq('c.user', ':by_user'))
                ->setParameter('by_user', $params['by_user']);
        }
    }
}