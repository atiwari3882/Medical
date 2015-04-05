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
     * @var \Medical\MedicalBundle\Entity\Condition
     */
    private $condition;


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
     * Set condition
     *
     * @param \Medical\MedicalBundle\Entity\Condition $condition
     * @return Symptom
     */
    public function setCondition(\Medical\MedicalBundle\Entity\Condition $condition = null)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Get condition
     *
     * @return \Medical\MedicalBundle\Entity\Condition 
     */
    public function getCondition()
    {
        return $this->condition;
    }
}
