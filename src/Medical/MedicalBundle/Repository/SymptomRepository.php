<?php

namespace Medical\MedicalBundle\Repository;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;

class SymptomRepository extends EntityRepository
{
    /**
     * @param array $params
     * @return QueryBuilder
     */
    public function getElements(array $params = [])
    {
        $q = $this->createQueryBuilder('s');
        $q->leftJoin('s.conditions', 'c');
        $q = $this->getByParamsForQuery($q, $params);

        return $q;
    }

    /**
     * APPLY filter by given params
     * @param QueryBuilder $q
     * @param $params
     * @return array|QueryBuilder
     */
    private function getByParamsForQuery(QueryBuilder $q, $params)
    {
        // GET by condition
        if (array_key_exists('by_condition', $params)) {
            $q->andWhere($q->expr()->in('c.id', ':by_condition'))
                ->setParameter('by_condition', $params['by_condition']);
        }

        // GET by action
        if (array_key_exists('by_action', $params)) {
            switch ($params['by_action']) {
                case 'execute':
                    $q = $q->getQuery()->getResult();
                    break;
            }
        }

        return $q;
    }
}