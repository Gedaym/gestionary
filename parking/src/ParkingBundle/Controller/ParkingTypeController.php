<?php

namespace ParkingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ParkingBundle\Entity\ParkingType;
use ParkingBundle\Form\ParkingTypeType;

/**
 * ParkingType controller.
 *
 */
class ParkingTypeController extends CrudController {

    protected $entity = "ParkingType";

    /**
     * Lists all ParkingType entities.
     *
     */
    public function indexAction() {
        return parent::index($this->entity);
    }

    /**
     * Creates a new ParkingType entity.
     *
     */
    public function newAction(Request $request) {
        $parkingtype = new ParkingType();
        return parent::create($request, $parkingtype);
    }

    /**
     * Finds and displays a ParkingType entity.
     *
     */
    public function showAction(ParkingType $parkingtype) {
        return parent::show($parkingtype);
    }

    /**
     * Displays a form to edit an existing ParkingType entity.
     *
     */
    public function editAction(Request $request, ParkingType $parkingtype) {
        return parent::edit($request, $parkingtype);
    }

    /**
     * Deletes a ParkingType entity.
     *
     */
    public function deleteAction(Request $request, ParkingType $parkingtype) {
        return parent::delete($request, $parkingtype);
    }

}
