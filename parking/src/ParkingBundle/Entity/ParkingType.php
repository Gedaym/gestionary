<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParkingType
 *
 * @ORM\Table(name="parking_type")
 * @ORM\Entity
 */
class ParkingType
{
    /**
     * @var string
     *
     * @ORM\Column(name="parking_type_name", type="string", length=30, nullable=false)
     */
    private $parkingTypeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="parking_type_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $parkingTypeId;



    /**
     * Set parkingTypeName
     *
     * @param string $parkingTypeName
     *
     * @return ParkingType
     */
    public function setParkingTypeName($parkingTypeName)
    {
        $this->parkingTypeName = $parkingTypeName;

        return $this;
    }

    /**
     * Get parkingTypeName
     *
     * @return string
     */
    public function getParkingTypeName()
    {
        return $this->parkingTypeName;
    }

    /**
     * Get parkingTypeId
     *
     * @return integer
     */
    public function getParkingTypeId()
    {
        return $this->parkingTypeId;
    }
}
