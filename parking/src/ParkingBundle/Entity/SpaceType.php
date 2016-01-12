<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SpaceType
 *
 * @ORM\Table(name="space_type")
 * @ORM\Entity
 */
class SpaceType
{
    /**
     * @var string
     *
     * @ORM\Column(name="space_type_name", type="string", length=30, nullable=false)
     */
    private $spaceTypeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="space_type_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spaceTypeId;



    /**
     * Set spaceTypeName
     *
     * @param string $spaceTypeName
     *
     * @return SpaceType
     */
    public function setSpaceTypeName($spaceTypeName)
    {
        $this->spaceTypeName = $spaceTypeName;

        return $this;
    }

    /**
     * Get spaceTypeName
     *
     * @return string
     */
    public function getSpaceTypeName()
    {
        return $this->spaceTypeName;
    }

    /**
     * Get spaceTypeId
     *
     * @return integer
     */
    public function getSpaceTypeId()
    {
        return $this->spaceTypeId;
    }
}
