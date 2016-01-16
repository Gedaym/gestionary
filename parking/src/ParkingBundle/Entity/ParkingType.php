<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParkingType
 *
 * @ORM\Table(name="parking_type")
 * @ORM\Entity
 */
class ParkingType {

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="parking_type_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $parkingTypeId;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ParkingType
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
     * Get parkingTypeId
     *
     * @return integer
     */
    public function getParkingTypeId() {
        return $this->parkingTypeId;
    }

    public function getId() {
        return $this->parkingTypeId;
    }

}
