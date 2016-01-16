<?php

namespace ParkingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ParkingBundle\Entity\Customer;
use ParkingBundle\Form\CustomerType;

/**
 * Customer controller.
 *
 */
class CustomerController extends CrudController {

    protected $entity = "Customer";

    /**
     * Lists all Customer entities.
     *
     */
    public function indexAction() {
        return parent::index($this->entity);
    }

    /**
     * Creates a new Customer entity.
     *
     */
    public function newAction(Request $request) {
        $customer = new Customer();
        return parent::create($request, $customer);
    }

    /**
     * Finds and displays a Customer entity.
     *
     */
    public function showAction(Customer $customer) {
        return parent::show($customer);
    }

    /**
     * Displays a form to edit an existing Customer entity.
     *
     */
    public function editAction(Request $request, Customer $customer) {
        return parent::edit($request, $customer);
    }

    /**
     * Deletes a Customer entity.
     *
     */
    public function deleteAction(Request $request, Customer $customer) {
        return parent::delete($request, $customer);
    }

}
