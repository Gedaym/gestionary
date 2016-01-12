<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offer
 *
 * @ORM\Table(name="offer")
 * @ORM\Entity
 */
class Offer
{
    /**
     * @var string
     *
     * @ORM\Column(name="offer_name", type="string", length=50, nullable=false)
     */
    private $offerName;

    /**
     * @var string
     *
     * @ORM\Column(name="offer_description", type="text", length=65535, nullable=true)
     */
    private $offerDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="offer_state", type="string", length=50, nullable=false)
     */
    private $offerState;

    /**
     * @var integer
     *
     * @ORM\Column(name="offer_reduction", type="integer", nullable=false)
     */
    private $offerReduction;

    /**
     * @var integer
     *
     * @ORM\Column(name="offer_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $offerId;



    /**
     * Set offerName
     *
     * @param string $offerName
     *
     * @return Offer
     */
    public function setOfferName($offerName)
    {
        $this->offerName = $offerName;

        return $this;
    }

    /**
     * Get offerName
     *
     * @return string
     */
    public function getOfferName()
    {
        return $this->offerName;
    }

    /**
     * Set offerDescription
     *
     * @param string $offerDescription
     *
     * @return Offer
     */
    public function setOfferDescription($offerDescription)
    {
        $this->offerDescription = $offerDescription;

        return $this;
    }

    /**
     * Get offerDescription
     *
     * @return string
     */
    public function getOfferDescription()
    {
        return $this->offerDescription;
    }

    /**
     * Set offerState
     *
     * @param string $offerState
     *
     * @return Offer
     */
    public function setOfferState($offerState)
    {
        $this->offerState = $offerState;

        return $this;
    }

    /**
     * Get offerState
     *
     * @return string
     */
    public function getOfferState()
    {
        return $this->offerState;
    }

    /**
     * Set offerReduction
     *
     * @param integer $offerReduction
     *
     * @return Offer
     */
    public function setOfferReduction($offerReduction)
    {
        $this->offerReduction = $offerReduction;

        return $this;
    }

    /**
     * Get offerReduction
     *
     * @return integer
     */
    public function getOfferReduction()
    {
        return $this->offerReduction;
    }

    /**
     * Get offerId
     *
     * @return integer
     */
    public function getOfferId()
    {
        return $this->offerId;
    }
}
