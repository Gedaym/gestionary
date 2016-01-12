<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Space
 *
 * @ORM\Table(name="space", indexes={@ORM\Index(name="FK_space_space_type", columns={"space_space_type_id"}), @ORM\Index(name="FK_space_space_state", columns={"space_space_state_id"})})
 * @ORM\Entity
 */
class Space
{
    /**
     * @var integer
     *
     * @ORM\Column(name="space_id_parking", type="integer", nullable=false)
     */
    private $spaceIdParking;

    /**
     * @var float
     *
     * @ORM\Column(name="space_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $spacePrice;

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
     *   @ORM\JoinColumn(name="space_space_type_id", referencedColumnName="space_type_id")
     * })
     */
    private $spaceSpaceType;

    /**
     * @var \ParkingBundle\Entity\SpaceState
     *
     * @ORM\ManyToOne(targetEntity="ParkingBundle\Entity\SpaceState")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="space_space_state_id", referencedColumnName="space_state_id")
     * })
     */
    private $spaceSpaceState;



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
     * Set spacePrice
     *
     * @param float $spacePrice
     *
     * @return Space
     */
    public function setSpacePrice($spacePrice)
    {
        $this->spacePrice = $spacePrice;

        return $this;
    }

    /**
     * Get spacePrice
     *
     * @return float
     */
    public function getSpacePrice()
    {
        return $this->spacePrice;
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
     * Set spaceSpaceType
     *
     * @param \ParkingBundle\Entity\SpaceType $spaceSpaceType
     *
     * @return Space
     */
    public function setSpaceSpaceType(\ParkingBundle\Entity\SpaceType $spaceSpaceType = null)
    {
        $this->spaceSpaceType = $spaceSpaceType;

        return $this;
    }

    /**
     * Get spaceSpaceType
     *
     * @return \ParkingBundle\Entity\SpaceType
     */
    public function getSpaceSpaceType()
    {
        return $this->spaceSpaceType;
    }

    /**
     * Set spaceSpaceState
     *
     * @param \ParkingBundle\Entity\SpaceState $spaceSpaceState
     *
     * @return Space
     */
    public function setSpaceSpaceState(\ParkingBundle\Entity\SpaceState $spaceSpaceState = null)
    {
        $this->spaceSpaceState = $spaceSpaceState;

        return $this;
    }

    /**
     * Get spaceSpaceState
     *
     * @return \ParkingBundle\Entity\SpaceState
     */
    public function getSpaceSpaceState()
    {
        return $this->spaceSpaceState;
    }
}
