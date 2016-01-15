<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parking
 *
 * @ORM\Table(name="parking", indexes={@ORM\Index(name="FK_parkingtype_parking", columns={"type_id"})})
 * @ORM\Entity
 */
class Parking {

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="number_street", type="integer", nullable=false)
     */
    private $numberStreet = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=50, nullable=false)
     */
    private $street = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=false)
     */
    private $city = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="postal_code", type="integer", nullable=false)
     */
    private $postalCode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="parking_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $parkingId;

    /**
     * @var \ParkingBundle\Entity\ParkingType
     *
     * @ORM\ManyToOne(targetEntity="ParkingBundle\Entity\ParkingType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="parking_type_id")
     * })
     */
    private $typeId;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Parking
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
     * Set numberStreet
     *
     * @param integer $numberStreet
     *
     * @return Parking
     */
    public function setNumberStreet($numberStreet) {
        $this->numberStreet = $numberStreet;

        return $this;
    }

    /**
     * Get numberStreet
     *
     * @return integer
     */
    public function getNumberStreet() {
        return $this->numberStreet;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Parking
     */
    public function setStreet($street) {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet() {
        return $this->street;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Parking
     */
    public function setCity($city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set postalCode
     *
     * @param integer $postalCode
     *
     * @return Parking
     */
    public function setPostalCode($postalCode) {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return integer
     */
    public function getPostalCode() {
        return $this->postalCode;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Parking
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Get parkingId
     *
     * @return integer
     */
    public function getParkingId() {
        return $this->parkingId;
    }

    /**
     * Set typeId
     *
     * @param \ParkingBundle\Entity\ParkingType $typeId
     *
     * @return Parking
     */
    public function setTypeId(\ParkingBundle\Entity\ParkingType $typeId = null) {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return \ParkingBundle\Entity\ParkingType
     */
    public function getTypeId() {
        return $this->typeId;
    }

}
