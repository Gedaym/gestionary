<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="FK_reservation_parking", columns={"parking_id"}), @ORM\Index(name="FK_reservation_customer", columns={"customer_id"})})
 * @ORM\Entity
 */
class Reservation {

    /**
     * @var integer
     *
     * @ORM\Column(name="number_reservation", type="integer", nullable=false)
     */
    private $numberReservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="date", nullable=false)
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="date", nullable=false)
     */
    private $dateEnd;

    /**
     * @var integer
     *
     * @ORM\Column(name="hour_start", type="integer", nullable=false)
     */
    private $hourStart;

    /**
     * @var integer
     *
     * @ORM\Column(name="hour_end", type="integer", nullable=false)
     */
    private $hourEnd;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_spaces", type="integer", nullable=false)
     */
    private $nbSpaces;

    /**
     * @var integer
     *
     * @ORM\Column(name="reservation_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reservationId;

    /**
     * @var \ParkingBundle\Entity\Parking
     *
     * @ORM\ManyToOne(targetEntity="ParkingBundle\Entity\Parking")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parking_id", referencedColumnName="parking_id")
     * })
     */
    private $parkingId;

    /**
     * @var \ParkingBundle\Entity\Customer
     *
     * @ORM\ManyToOne(targetEntity="ParkingBundle\Entity\Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="customer_id")
     * })
     */
    private $customerId;

    /**
     * Set numberReservation
     *
     * @param integer $numberReservation
     *
     * @return Reservation
     */
    public function setNumberReservation($numberReservation) {
        $this->numberReservation = $numberReservation;

        return $this;
    }

    /**
     * Get numberReservation
     *
     * @return integer
     */
    public function getNumberReservation() {
        return $this->numberReservation;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return Reservation
     */
    public function setDateStart($dateStart) {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart() {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return Reservation
     */
    public function setDateEnd($dateEnd) {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd() {
        return $this->dateEnd;
    }

    /**
     * Set hourStart
     *
     * @param integer $hourStart
     *
     * @return Reservation
     */
    public function setHourStart($hourStart) {
        $this->hourStart = $hourStart;

        return $this;
    }

    /**
     * Get hourStart
     *
     * @return integer
     */
    public function getHourStart() {
        return $this->hourStart;
    }

    /**
     * Set hourEnd
     *
     * @param integer $hourEnd
     *
     * @return Reservation
     */
    public function setHourEnd($hourEnd) {
        $this->hourEnd = $hourEnd;

        return $this;
    }

    /**
     * Get hourEnd
     *
     * @return integer
     */
    public function getHourEnd() {
        return $this->hourEnd;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Reservation
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
     * Get reservationId
     *
     * @return integer
     */
    public function getReservationId() {
        return $this->reservationId;
    }

    /**
     * Set nbSpaces
     *
     * @param integer $nbSpaces
     *
     * @return Reservation
     */
    public function setNbSpaces($nbSpaces) {
        $this->nbSpaces = $nbSpaces;

        return $this;
    }

    /**
     * Get nbSpaces
     *
     * @return integer
     */
    public function getNbSpaces() {
        return $this->nbSpaces;
    }

    /**
     * Set parkingId
     *
     * @param \ParkingBundle\Entity\Parking $parkingId
     *
     * @return Reservation
     */
    public function setParkingId(\ParkingBundle\Entity\Parking $parkingId = null) {
        $this->parkingId = $parkingId;

        return $this;
    }

    /**
     * Get parkingId
     *
     * @return \ParkingBundle\Entity\Parking
     */
    public function getParkingId() {
        return $this->parkingId;
    }

    /**
     * Set customerId
     *
     * @param \ParkingBundle\Entity\Customer $customerId
     *
     * @return Reservation
     */
    public function setCustomerId(\ParkingBundle\Entity\Customer $customerId = null) {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return \ParkingBundle\Entity\Customer
     */
    public function getCustomerId() {
        return $this->customerId;
    }

    public function getId() {
        return $this->reservationId;
    }

}
