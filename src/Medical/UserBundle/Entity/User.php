<?php

namespace Medical\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    private $email_new;

    /**
     * @var \Medical\UserBundle\Entity\UserProfile
     */
    private $UserProfile;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $conditions;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
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
     * Set email_new
     *
     * @param string $emailNew
     * @return User
     */
    public function setEmailNew($emailNew)
    {
        $this->email_new = $emailNew;

        return $this;
    }

    /**
     * Get email_new
     *
     * @return string 
     */
    public function getEmailNew()
    {
        return $this->email_new;
    }

    /**
     * Set UserProfile
     *
     * @param \Medical\UserBundle\Entity\UserProfile $userProfile
     * @return User
     */
    public function setUserProfile(\Medical\UserBundle\Entity\UserProfile $userProfile = null)
    {
        $this->UserProfile = $userProfile;

        return $this;
    }

    /**
     * Get UserProfile
     *
     * @return \Medical\UserBundle\Entity\UserProfile 
     */
    public function getUserProfile()
    {
        return $this->UserProfile;
    }

    /**
     * Add conditions
     *
     * @param \Medical\MedicalBundle\Entity\Condition $conditions
     * @return User
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
