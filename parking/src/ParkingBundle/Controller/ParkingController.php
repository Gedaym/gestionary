<?php

namespace ParkingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ParkingBundle\Entity\Parking;
use ParkingBundle\Form\ParkingType;

/**
 * Parking controller.
 *
 */
class ParkingController extends CrudController {

    protected $entity = "Parking";

    /**
     * Lists all Parking entities.
     *
     */
    public function indexAction() {
        return parent::index($this->entity);
    }

    /**
     * Creates a new Parking entity.
     *
     */
    public function newAction(Request $request) {
        $parking = new Parking();
        return parent::create($request, $parking);
    }

    /**
     * Finds and displays a Parking entity.
     *
     */
    public function showAction(Parking $parking) {
        return parent::show($parking);
    }

    /**
     * Displays a form to edit an existing Parking entity.
     *
     */
    public function editAction(Request $request, Parking $parking) {
        return parent::edit($request, $parking);
    }

    /**
     * Deletes a Parking entity.
     *
     */
    public function deleteAction(Request $request, Parking $parking) {
        return parent::delete($request, $parking);
    }

}
