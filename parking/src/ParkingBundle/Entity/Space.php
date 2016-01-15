<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Space
 *
 * @ORM\Table(name="space", indexes={@ORM\Index(name="FK_space_space_type", columns={"type"}), @ORM\Index(name="FK_space_space_state", columns={"state"})})
 * @ORM\Entity
 */
class Space {

    /**
     * @var integer
     *
     * @ORM\Column(name="space_id_parking", type="integer", nullable=false)
     */
    private $spaceIdParking;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="space_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spaceId;

    /**
     * @var \ParkingBundle\Entity\SpaceType
     *
     * @ORM\ManyToOne(targetEntity="ParkingBundle\Entity\SpaceType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type", referencedColumnName="space_type_id")
     * })
     */
    private $type;

    /**
     * @var \ParkingBundle\Entity\SpaceState
     *
     * @ORM\ManyToOne(targetEntity="ParkingBundle\Entity\SpaceState")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="state", referencedColumnName="space_state_id")
     * })
     */
    private $state;


    /**
     * Set spaceIdParking
     *
     * @param integer $spaceIdParking
     *
     * @return Space
     */
    public function setSpaceIdParking($spaceIdParking)
    {
        $this->spaceIdParking = $spaceIdParking;

        return $this;
    }

    /**
     * Get spaceIdParking
     *
     * @return integer
     */
    public function getSpaceIdParking()
    {
        return $this->spaceIdParking;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Space
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get spaceId
     *
     * @return integer
     */
    public function getSpaceId()
    {
        return $this->spaceId;
    }

    /**
     * Set type
     *
     * @param \ParkingBundle\Entity\SpaceType $type
     *
     * @return Space
     */
    public function setType(\ParkingBundle\Entity\SpaceType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \ParkingBundle\Entity\SpaceType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set state
     *
     * @param \ParkingBundle\Entity\SpaceState $state
     *
     * @return Space
     */
    public function setState(\ParkingBundle\Entity\SpaceState $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \ParkingBundle\Entity\SpaceState
     */
    public function getState()
    {
        return $this->state;
    }
}
