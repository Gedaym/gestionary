<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="FK_user_user_status", columns={"user_user_status_id"})})
 * @ORM\Entity
 */
class User extends BaseUser {

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=50, nullable=true)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_surname", type="string", length=50, nullable=true)
     */
    private $userSurname;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=50, nullable=true)
     */
    private $userEmail;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var \ParkingBundle\Entity\UserStatus
     *
     * @ORM\ManyToOne(targetEntity="ParkingBundle\Entity\UserStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_user_status_id", referencedColumnName="user_status_id")
     * })
     */
    private $userUserStatus;

    public function __construct() {
        parent::__construct();
        // your own logic
    }

    /**
     * Set userName
     *
     * @param string $userName
     *
     * @return User
     */
    public function setUserName($userName) {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * Set userSurname
     *
     * @param string $userSurname
     *
     * @return User
     */
    public function setUserSurname($userSurname) {
        $this->userSurname = $userSurname;

        return $this;
    }

    /**
     * Get userSurname
     *
     * @return string
     */
    public function getUserSurname() {
        return $this->userSurname;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     *
     * @return User
     */
    public function setUserEmail($userEmail) {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string
     */
    public function getUserEmail() {
        return $this->userEmail;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * Set userUserStatus
     *
     * @param \ParkingBundle\Entity\UserStatus $userUserStatus
     *
     * @return User
     */
    public function setUserUserStatus(\ParkingBundle\Entity\UserStatus $userUserStatus = null) {
        $this->userUserStatus = $userUserStatus;

        return $this;
    }

    /**
     * Get userUserStatus
     *
     * @return \ParkingBundle\Entity\UserStatus
     */
    public function getUserUserStatus() {
        return $this->userUserStatus;
    }

}
