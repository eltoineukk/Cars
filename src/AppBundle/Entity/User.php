<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOnRegister", type="datetime")
     */
    private $dateOnRegister;

    /**
     * @var bool
     *
     * @ORM\Column(name="isDeleted", type="boolean", nullable=true)
     */
    private $isDeleted;

    /**
     * @var int
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    private $level;

    /**
     * @var int
     * @ORM\Column(name="money", type="integer", nullable=false)
     */
    private $money;

    /**
     * @var int
     * @ORM\Column(name="fame", type="integer", nullable=false)
     */
    private $fame;

    /**
     * @var int
     * @ORM\Column(name="speed", type="integer", nullable=false)
     */
    private $speed;

    /**
     * @var int
     * @ORM\Column(name="acceleration", type="integer", nullable=false)
     */
    private $acceleration;

    /**
     * @var int
     * @ORM\Column(name="handling", type="integer", nullable=false)
     */
    private $handling;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="UserProfileVisit", mappedBy="user")
     */
    private $visitors;



    /**
     * @var bool
     */
    private $terms;

    /**
     * @var string
     */
    public $rPassword;

    public function __construct()
    {
        $this->setDateOnRegister(new \DateTime('now'));
        $this->level = 1;
        $this->money = 0;
        $this->fame = 1;
        $this->speed = 5;
        $this->acceleration = 5;
        $this->handling = 5;
        $this->visitors = [];
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dateOnRegister
     *
     * @param \DateTime $dateOnRegister
     *
     * @return User
     */
    public function setDateOnRegister($dateOnRegister)
    {
        $this->dateOnRegister = $dateOnRegister;

        return $this;
    }

    /**
     * Get dateOnRegister
     *
     * @return \DateTime
     */
    public function getDateOnRegister()
    {
        return $this->dateOnRegister;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return User
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return bool
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    public function getTerms()
    {
        return $this->terms;
    }

    public function setTerms(bool $terms)
    {
        $this->terms = $terms;
    }

    public function getRPassword()
    {
        return $this->rPassword;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param int $money
     */
    public function setMoney($money)
    {
        $this->money = $money;
    }

    /**
     * @return int
     */
    public function getFame()
    {
        return $this->fame;
    }

    /**
     * @param int $fame
     */
    public function setFame($fame)
    {
        $this->fame = $fame;
    }

    /**
     * @return int
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return int
     */
    public function getAcceleration()
    {
        return $this->acceleration;
    }

    /**
     * @param int $acceleration
     */
    public function setAcceleration($acceleration)
    {
        $this->acceleration = $acceleration;
    }

    /**
     * @return int
     */
    public function getHandling()
    {
        return $this->handling;
    }

    /**
     * @param int $handling
     */
    public function setHandling($handling)
    {
        $this->handling = $handling;
    }



    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return array('ROLE_USER');
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return [];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        //todo
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}

