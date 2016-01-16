<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offer
 *
 * @ORM\Table(name="offer")
 * @ORM\Entity
 */
class Offer {

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=50, nullable=false)
     */
    private $state;

    /**
     * @var integer
     *
     * @ORM\Column(name="reduction", type="integer", nullable=false)
     */
    private $reduction;

    /**
     * @var integer
     *
     * @ORM\Column(name="offer_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $offerId;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Offer
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
     * Set description
     *
     * @param string $description
     *
     * @return Offer
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
     * Set state
     *
     * @param string $state
     *
     * @return Offer
     */
    public function setState($state) {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState() {
        return $this->state;
    }

    /**
     * Set reduction
     *
     * @param integer $reduction
     *
     * @return Offer
     */
    public function setReduction($reduction) {
        $this->reduction = $reduction;

        return $this;
    }

    /**
     * Get reduction
     *
     * @return integer
     */
    public function getReduction() {
        return $this->reduction;
    }

    /**
     * Get offerId
     *
     * @return integer
     */
    public function getOfferId() {
        return $this->offerId;
    }

    public function getId() {
        return $this->offerId;
    }

}
