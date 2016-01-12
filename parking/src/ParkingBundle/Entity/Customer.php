<?php

namespace ParkingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id_type_adhesion", type="integer", nullable=false)
     */
    private $customerIdTypeAdhesion;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_immatriculation", type="integer", nullable=false)
     */
    private $customerImmatriculation;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerId;



    /**
     * Set customerIdTypeAdhesion
     *
     * @param integer $customerIdTypeAdhesion
     *
     * @return Customer
     */
    public function setCustomerIdTypeAdhesion($customerIdTypeAdhesion)
    {
        $this->customerIdTypeAdhesion = $customerIdTypeAdhesion;

        return $this;
    }

    /**
     * Get customerIdTypeAdhesion
     *
     * @return integer
     */
    public function getCustomerIdTypeAdhesion()
    {
        return $this->customerIdTypeAdhesion;
    }

    /**
     * Set customerImmatriculation
     *
     * @param integer $customerImmatriculation
     *
     * @return Customer
     */
    public function setCustomerImmatriculation($customerImmatriculation)
    {
        $this->customerImmatriculation = $customerImmatriculation;

        return $this;
    }

    /**
     * Get customerImmatriculation
     *
     * @return integer
     */
    public function getCustomerImmatriculation()
    {
        return $this->customerImmatriculation;
    }

    /**
     * Get customerId
     *
     * @return integer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }
}
