<?php

namespace Medical\MedicalBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Medical\MedicalBundle\Entity\Condition;
use Medical\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadConditions extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->createCondition('Asthma');
        $this->createCondition('Diabetes');
        $manager->flush();
    }

    /**
     * @param $name
     */
    private function createCondition($name)
    {
        $condition = new Condition();
        $condition->setName($name);
        $this->manager->persist($condition);
        $this->addReference($name, $condition);
    }

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @return int
     */
    function getOrder()
    {
        return 2;
    }
}
