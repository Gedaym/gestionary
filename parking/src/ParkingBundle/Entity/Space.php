<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Space
 *
 * @ORM\Table(name="space", indexes={@ORM\Index(name="FK_space_space_type", columns={"space_type_id"}), @ORM\Index(name="FK_space_space_state", columns={"space_state_id"})})
 * @ORM\Entity
 */
class Space {

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="ParkingBundle\Entity\Parking")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parking_id", referencedColumnName="parking_id")
     * })
     */
    private $ParkingId;

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
     *   @ORM\JoinColumn(name="space_type_id", referencedColumnName="space_type_id")
     * })
     */
    private $SpaceTypeId;

    /**
     * @var \ParkingBundle\Entity\SpaceState
     *
     * @ORM\ManyToOne(targetEntity="ParkingBundle\Entity\SpaceState")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="space_state_id", referencedColumnName="space_state_id")
     * })
     */
    private $SpaceStateId;

    /**
     * Set spaceIdParking
     *
     * @param integer $spaceIdParking
     *
     * @return Space
     */
    public function setSpaceIdParking($spaceIdParking) {
        $this->spaceIdParking = $spaceIdParking;

        return $this;
    }

    /**
     * Get spaceIdParking
     *
     * @return integer
     */
    public function getSpaceIdParking() {
        return $this->spaceIdParking;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Space
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Get spaceId
     *
     * @return integer
     */
    public function getSpaceId() {
        return $this->spaceId;
    }

    /**
     * Set parkingId
     *
     * @param \ParkingBundle\Entity\Parking $parkingId
     *
     * @return Space
     */
    public function setParkingId(\ParkingBundle\Entity\Parking $parkingId = null) {
        $this->ParkingId = $parkingId;

        return $this;
    }

    /**
     * Get parkingId
     *
     * @return \ParkingBundle\Entity\Parking
     */
    public function getParkingId() {
        return $this->ParkingId;
    }

    /**
     * Set spaceTypeId
     *
     * @param \ParkingBundle\Entity\SpaceType $spaceTypeId
     *
     * @return Space
     */
    public function setSpaceTypeId(\ParkingBundle\Entity\SpaceType $spaceTypeId = null) {
        $this->SpaceTypeId = $spaceTypeId;

        return $this;
    }

    /**
     * Get spaceTypeId
     *
     * @return \ParkingBundle\Entity\SpaceType
     */
    public function getSpaceTypeId() {
        return $this->SpaceTypeId;
    }

    /**
     * Set spaceStateId
     *
     * @param \ParkingBundle\Entity\SpaceState $spaceStateId
     *
     * @return Space
     */
    public function setSpaceStateId(\ParkingBundle\Entity\SpaceState $spaceStateId = null) {
        $this->SpaceStateId = $spaceStateId;

        return $this;
    }

    /**
     * Get spaceStateId
     *
     * @return \ParkingBundle\Entity\SpaceState
     */
    public function getSpaceStateId() {
        return $this->SpaceStateId;
    }

}
