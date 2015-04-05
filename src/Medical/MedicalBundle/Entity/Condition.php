<?php

namespace Medical\MedicalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Condition
 */
class Condition
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
    private $symptoms;

    /**
     * @var \Medical\UserBundle\Entity\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->symptoms = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Condition
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
     * Add symptoms
     *
     * @param \Medical\MedicalBundle\Entity\Symptom $symptoms
     * @return Condition
     */
    public function addSymptom(\Medical\MedicalBundle\Entity\Symptom $symptoms)
    {
        $this->symptoms[] = $symptoms;

        return $this;
    }

    /**
     * Remove symptoms
     *
     * @param \Medical\MedicalBundle\Entity\Symptom $symptoms
     */
    public function removeSymptom(\Medical\MedicalBundle\Entity\Symptom $symptoms)
    {
        $this->symptoms->removeElement($symptoms);
    }

    /**
     * Get symptoms
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSymptoms()
    {
        return $this->symptoms;
    }

    /**
     * Set user
     *
     * @param \Medical\UserBundle\Entity\User $user
     * @return Condition
     */
    public function setUser(\Medical\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Medical\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
