<?php

namespace ParkingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ParkingBundle\Entity\Reservation;
use ParkingBundle\Form\ReservationType;
use ParkingBundle\Entity\Parking;

/**
 * Reservation controller.
 *
 */
class ReservationController extends CrudController {

    protected $entity = "Reservation";

    /**
     * Lists all Reservation entities.
     *
     */
    public function indexAction() {
        return parent::index($this->entity);
    }

    /**
     * Creates a new Reservation entity.
     *
     */
    public function newAction(Request $request) {
        $reservation = new Reservation();
        return parent::create($request, $reservation);
    }

    /**
     * Finds and displays a Reservation entity.
     *
     */
    public function showAction(Reservation $reservation) {
        return parent::show($reservation);
    }

    /**
     * Displays a form to edit an existing Reservation entity.
     *
     */
    public function editAction(Request $request, Reservation $reservation) {
        return parent::edit($request, $reservation);
    }

    /**
     * Deletes a Reservation entity.
     *
     */
    public function deleteAction(Request $request, Reservation $reservation) {
        return parent::delete($request, $reservation);
    }

}
