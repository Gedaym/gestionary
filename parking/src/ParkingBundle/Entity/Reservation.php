<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="FK_reservation_parking", columns={"reservation_parking_id"}), @ORM\Index(name="FK_reservation_customer", columns={"reservation_customer_id"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="reservation_number_reservation", type="integer", nullable=false)
     */
    private $reservationNumberReservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reservation_date_start", type="date", nullable=false)
     */
    private $reservationDateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reservation_date_end", type="date", nullable=false)
     */
    private $reservationDateEnd;

    /**
     * @var integer
     *
     * @ORM\Column(name="reservation_hour_start", type="integer", nullable=false)
     */
    private $reservationHourStart;

    /**
     * @var integer
     *
     * @ORM\Column(name="reservation_hour_end", type="integer", nullable=false)
     */
    private $reservationHourEnd;

    /**
     * @var float
     *
     * @ORM\Column(name="reservation_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $reservationPrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="reservation_id_space", type="integer", nullable=false)
     */
    private $reservationIdSpace;

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
     *   @ORM\JoinColumn(name="reservation_parking_id", referencedColumnName="parking_id")
     * })
     */
    private $reservationParking;

    /**
     * @var \ParkingBundle\Entity\Customer
     *
     * @ORM\ManyToOne(targetEntity="ParkingBundle\Entity\Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reservation_customer_id", referencedColumnName="customer_id")
     * })
     */
    private $reservationCustomer;



    /**
     * Set reservationNumberReservation
     *
     * @param integer $reservationNumberReservation
     *
     * @return Reservation
     */
    public function setReservationNumberReservation($reservationNumberReservation)
    {
        $this->reservationNumberReservation = $reservationNumberReservation;

        return $this;
    }

    /**
     * Get reservationNumberReservation
     *
     * @return integer
     */
    public function getReservationNumberReservation()
    {
        return $this->reservationNumberReservation;
    }

    /**
     * Set reservationDateStart
     *
     * @param \DateTime $reservationDateStart
     *
     * @return Reservation
     */
    public function setReservationDateStart($reservationDateStart)
    {
        $this->reservationDateStart = $reservationDateStart;

        return $this;
    }

    /**
     * Get reservationDateStart
     *
     * @return \DateTime
     */
    public function getReservationDateStart()
    {
        return $this->reservationDateStart;
    }

    /**
     * Set reservationDateEnd
     *
     * @param \DateTime $reservationDateEnd
     *
     * @return Reservation
     */
    public function setReservationDateEnd($reservationDateEnd)
    {
        $this->reservationDateEnd = $reservationDateEnd;

        return $this;
    }

    /**
     * Get reservationDateEnd
     *
     * @return \DateTime
     */
    public function getReservationDateEnd()
    {
        return $this->reservationDateEnd;
    }

    /**
     * Set reservationHourStart
     *
     * @param integer $reservationHourStart
     *
     * @return Reservation
     */
    public function setReservationHourStart($reservationHourStart)
    {
        $this->reservationHourStart = $reservationHourStart;

        return $this;
    }

    /**
     * Get reservationHourStart
     *
     * @return integer
     */
    public function getReservationHourStart()
    {
        return $this->reservationHourStart;
    }

    /**
     * Set reservationHourEnd
     *
     * @param integer $reservationHourEnd
     *
     * @return Reservation
     */
    public function setReservationHourEnd($reservationHourEnd)
    {
        $this->reservationHourEnd = $reservationHourEnd;

        return $this;
    }

    /**
     * Get reservationHourEnd
     *
     * @return integer
     */
    public function getReservationHourEnd()
    {
        return $this->reservationHourEnd;
    }

    /**
     * Set reservationPrice
     *
     * @param float $reservationPrice
     *
     * @return Reservation
     */
    public function setReservationPrice($reservationPrice)
    {
        $this->reservationPrice = $reservationPrice;

        return $this;
    }

    /**
     * Get reservationPrice
     *
     * @return float
     */
    public function getReservationPrice()
    {
        return $this->reservationPrice;
    }

    /**
     * Set reservationIdSpace
     *
     * @param integer $reservationIdSpace
     *
     * @return Reservation
     */
    public function setReservationIdSpace($reservationIdSpace)
    {
        $this->reservationIdSpace = $reservationIdSpace;

        return $this;
    }

    /**
     * Get reservationIdSpace
     *
     * @return integer
     */
    public function getReservationIdSpace()
    {
        return $this->reservationIdSpace;
    }

    /**
     * Get reservationId
     *
     * @return integer
     */
    public function getReservationId()
    {
        return $this->reservationId;
    }

    /**
     * Set reservationParking
     *
     * @param \ParkingBundle\Entity\Parking $reservationParking
     *
     * @return Reservation
     */
    public function setReservationParking(\ParkingBundle\Entity\Parking $reservationParking = null)
    {
        $this->reservationParking = $reservationParking;

        return $this;
    }

    /**
     * Get reservationParking
     *
     * @return \ParkingBundle\Entity\Parking
     */
    public function getReservationParking()
    {
        return $this->reservationParking;
    }

    /**
     * Set reservationCustomer
     *
     * @param \ParkingBundle\Entity\Customer $reservationCustomer
     *
     * @return Reservation
     */
    public function setReservationCustomer(\ParkingBundle\Entity\Customer $reservationCustomer = null)
    {
        $this->reservationCustomer = $reservationCustomer;

        return $this;
    }

    /**
     * Get reservationCustomer
     *
     * @return \ParkingBundle\Entity\Customer
     */
    public function getReservationCustomer()
    {
        return $this->reservationCustomer;
    }
}
