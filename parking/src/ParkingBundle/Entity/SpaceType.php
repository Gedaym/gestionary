<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SpaceType
 *
 * @ORM\Table(name="space_type")
 * @ORM\Entity
 */
class SpaceType {

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="space_type_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spaceTypeId;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return SpaceType
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
     * Get spaceTypeId
     *
     * @return integer
     */
    public function getSpaceTypeId() {
        return $this->spaceTypeId;
    }

    public function getId() {
        return $this->spaceTypeId;
    }

}
