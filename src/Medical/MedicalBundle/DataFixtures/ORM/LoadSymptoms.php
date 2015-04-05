<?php

namespace Medical\MedicalBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Medical\MedicalBundle\Entity\Condition;
use Medical\MedicalBundle\Entity\Symptom;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadSymptoms extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        // FIRST CONDITION Asthma
        $condition = $this->getReference('Asthma');
        $this->createSymptom('coughing', $condition);
        $this->createSymptom('shortness of breath', $condition);

        // SECOND CONDITION Asthma
        $condition = $this->getReference('Diabetes');
        $this->createSymptom('tiredness', $condition);
        $this->createSymptom('weight loss', $condition);

        $manager->flush();
    }

    /**
     * @param string $name
     * @param Condition $condition
     */
    private function createSymptom($name, Condition $condition)
    {
        $symptom = new Symptom();
        $symptom->setName($name);
        $symptom->setCondition($condition);
        $this->manager->persist($symptom);
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
        return 3;
    }
}
