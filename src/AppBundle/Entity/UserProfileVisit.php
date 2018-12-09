<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserProfileVisit
 *
 * @ORM\Table(name="user_profile_visits")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserProfileVisitRepository")
 */
class UserProfileVisit
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
     * @ORM\Column(name="visitorIp", type="string", length=255)
     */
    private $visitorIp;

    /**
     * @var int
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;
    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     */
    private $user;


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
     * Set visitorIp
     *
     * @param string $visitorIp
     *
     * @return UserProfileVisit
     */
    public function setVisitorIp($visitorIp)
    {
        $this->visitorIp = $visitorIp;

        return $this;
    }

    /**
     * Get visitorIp
     *
     * @return string
     */
    public function getVisitorIp()
    {
        return $this->visitorIp;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}

