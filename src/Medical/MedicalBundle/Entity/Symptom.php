<?php

namespace Medical\MedicalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Symptom
 */
class Symptom
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $conditions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->conditions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Symptom
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add conditions
     *
     * @param \Medical\MedicalBundle\Entity\Condition $conditions
     * @return Symptom
     */
    public function addCondition(\Medical\MedicalBundle\Entity\Condition $conditions)
    {
        $this->conditions[] = $conditions;

        return $this;
    }

    /**
     * Remove conditions
     *
     * @param \Medical\MedicalBundle\Entity\Condition $conditions
     */
    public function removeCondition(\Medical\MedicalBundle\Entity\Condition $conditions)
    {
        $this->conditions->removeElement($conditions);
    }

    /**
     * Get conditions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConditions()
    {
        return $this->conditions;
    }
}
