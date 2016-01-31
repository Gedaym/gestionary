<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SpaceState
 *
 * @ORM\Table(name="space_state")
 * @ORM\Entity
 */
class SpaceState {

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="space_state_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spaceStateId;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return SpaceState
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
     * Get spaceStateId
     *
     * @return integer
     */
    public function getSpaceStateId() {
        return $this->spaceStateId;
    }

    public function getId() {
        return $this->spaceStateId;
    }

}
