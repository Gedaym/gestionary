<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity
 */
class Customer {

    /**
     * @var integer
     *
     * @ORM\Column(name="type_adhesion", type="integer", nullable=false)
     */
    private $typeAdhesion;

    /**
     * @var integer
     *
     * @ORM\Column(name="immatriculation", type="integer", nullable=false)
     */
    private $immatriculation;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerId;

    /**
     * Set typeAdhesion
     *
     * @param integer $typeAdhesion
     *
     * @return Customer
     */
    public function setTypeAdhesion($typeAdhesion) {
        $this->typeAdhesion = $typeAdhesion;

        return $this;
    }

    /**
     * Get typeAdhesion
     *
     * @return integer
     */
    public function getTypeAdhesion() {
        return $this->typeAdhesion;
    }

    /**
     * Set immatriculation
     *
     * @param integer $immatriculation
     *
     * @return Customer
     */
    public function setImmatriculation($immatriculation) {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    /**
     * Get immatriculation
     *
     * @return integer
     */
    public function getImmatriculation() {
        return $this->immatriculation;
    }

    /**
     * Get customerId
     *
     * @return integer
     */
    public function getCustomerId() {
        return $this->customerId;
    }

    public function getId() {
        return $this->customerId;
    }

}
