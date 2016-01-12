<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserStatus
 *
 * @ORM\Table(name="user_status")
 * @ORM\Entity
 */
class UserStatus
{
    /**
     * @var string
     *
     * @ORM\Column(name="user_status_name", type="string", length=30, nullable=false)
     */
    private $userStatusName;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_status_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userStatusId;



    /**
     * Set userStatusName
     *
     * @param string $userStatusName
     *
     * @return UserStatus
     */
    public function setUserStatusName($userStatusName)
    {
        $this->userStatusName = $userStatusName;

        return $this;
    }

    /**
     * Get userStatusName
     *
     * @return string
     */
    public function getUserStatusName()
    {
        return $this->userStatusName;
    }

    /**
     * Get userStatusId
     *
     * @return integer
     */
    public function getUserStatusId()
    {
        return $this->userStatusId;
    }
}
