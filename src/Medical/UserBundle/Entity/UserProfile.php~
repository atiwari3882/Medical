<?php

namespace Medical\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserProfile
 */
class UserProfile
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var \DateTime
     */
    private $birthday;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var \Medical\UserBundle\Entity\User
     */
    private $User;


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
     * Set firstname
     *
     * @param string $firstname
     * @return UserProfile
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return UserProfile
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return UserProfile
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return UserProfile
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set User
     *
     * @param \Medical\UserBundle\Entity\User $user
     * @return UserProfile
     */
    public function setUser(\Medical\UserBundle\Entity\User $user = null)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get User
     *
     * @return \Medical\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->User;
    }
}
