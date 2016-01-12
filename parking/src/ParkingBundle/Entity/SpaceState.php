<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SpaceState
 *
 * @ORM\Table(name="space_state")
 * @ORM\Entity
 */
class SpaceState
{
    /**
     * @var string
     *
     * @ORM\Column(name="space_state_name", type="string", length=50, nullable=false)
     */
    private $spaceStateName;

    /**
     * @var integer
     *
     * @ORM\Column(name="space_state_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spaceStateId;



    /**
     * Set spaceStateName
     *
     * @param string $spaceStateName
     *
     * @return SpaceState
     */
    public function setSpaceStateName($spaceStateName)
    {
        $this->spaceStateName = $spaceStateName;

        return $this;
    }

    /**
     * Get spaceStateName
     *
     * @return string
     */
    public function getSpaceStateName()
    {
        return $this->spaceStateName;
    }

    /**
     * Get spaceStateId
     *
     * @return integer
     */
    public function getSpaceStateId()
    {
        return $this->spaceStateId;
    }
}
