<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parking
 *
 * @ORM\Table(name="parking", indexes={@ORM\Index(name="FK_parking_parking_type_id", columns={"parking_parking_type_id"})})
 * @ORM\Entity
 */
class Parking
{
    /**
     * @var string
     *
     * @ORM\Column(name="parking_name", type="string", length=50, nullable=false)
     */
    private $parkingName = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="parking_number_street", type="integer", nullable=false)
     */
    private $parkingNumberStreet = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="parking_street", type="string", length=50, nullable=false)
     */
    private $parkingStreet = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="parking_city", type="string", length=50, nullable=false)
     */
    private $parkingCity = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="parking_postal_code", type="integer", nullable=false)
     */
    private $parkingPostalCode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="parking_description", type="text", length=65535, nullable=true)
     */
    private $parkingDescription;

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
     *   @ORM\JoinColumn(name="parking_parking_type_id", referencedColumnName="parking_type_id")
     * })
     */
    private $parkingParkingType;



    /**
     * Set parkingName
     *
     * @param string $parkingName
     *
     * @return Parking
     */
    public function setParkingName($parkingName)
    {
        $this->parkingName = $parkingName;

        return $this;
    }

    /**
     * Get parkingName
     *
     * @return string
     */
    public function getParkingName()
    {
        return $this->parkingName;
    }

    /**
     * Set parkingNumberStreet
     *
     * @param integer $parkingNumberStreet
     *
     * @return Parking
     */
    public function setParkingNumberStreet($parkingNumberStreet)
    {
        $this->parkingNumberStreet = $parkingNumberStreet;

        return $this;
    }

    /**
     * Get parkingNumberStreet
     *
     * @return integer
     */
    public function getParkingNumberStreet()
    {
        return $this->parkingNumberStreet;
    }

    /**
     * Set parkingStreet
     *
     * @param string $parkingStreet
     *
     * @return Parking
     */
    public function setParkingStreet($parkingStreet)
    {
        $this->parkingStreet = $parkingStreet;

        return $this;
    }

    /**
     * Get parkingStreet
     *
     * @return string
     */
    public function getParkingStreet()
    {
        return $this->parkingStreet;
    }

    /**
     * Set parkingCity
     *
     * @param string $parkingCity
     *
     * @return Parking
     */
    public function setParkingCity($parkingCity)
    {
        $this->parkingCity = $parkingCity;

        return $this;
    }

    /**
     * Get parkingCity
     *
     * @return string
     */
    public function getParkingCity()
    {
        return $this->parkingCity;
    }

    /**
     * Set parkingPostalCode
     *
     * @param integer $parkingPostalCode
     *
     * @return Parking
     */
    public function setParkingPostalCode($parkingPostalCode)
    {
        $this->parkingPostalCode = $parkingPostalCode;

        return $this;
    }

    /**
     * Get parkingPostalCode
     *
     * @return integer
     */
    public function getParkingPostalCode()
    {
        return $this->parkingPostalCode;
    }

    /**
     * Set parkingDescription
     *
     * @param string $parkingDescription
     *
     * @return Parking
     */
    public function setParkingDescription($parkingDescription)
    {
        $this->parkingDescription = $parkingDescription;

        return $this;
    }

    /**
     * Get parkingDescription
     *
     * @return string
     */
    public function getParkingDescription()
    {
        return $this->parkingDescription;
    }

    /**
     * Get parkingId
     *
     * @return integer
     */
    public function getParkingId()
    {
        return $this->parkingId;
    }

    /**
     * Set parkingParkingType
     *
     * @param \ParkingBundle\Entity\ParkingType $parkingParkingType
     *
     * @return Parking
     */
    public function setParkingParkingType(\ParkingBundle\Entity\ParkingType $parkingParkingType = null)
    {
        $this->parkingParkingType = $parkingParkingType;

        return $this;
    }

    /**
     * Get parkingParkingType
     *
     * @return \ParkingBundle\Entity\ParkingType
     */
    public function getParkingParkingType()
    {
        return $this->parkingParkingType;
    }
}
