<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserStatus
 *
 * @ORM\Table(name="user_status")
 * @ORM\Entity
 */
class UserStatus {

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_status_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userStatusId;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return UserStatus
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get userStatusId
     *
     * @return integer
     */
    public function getUserStatusId() {
        return $this->userStatusId;
    }

    public function getId() {
        return $this->userStatusId;
    }

}
