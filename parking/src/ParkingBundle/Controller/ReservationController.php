<?php

namespace ParkingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ParkingBundle\Entity\Reservation;
use ParkingBundle\Form\ReservationType;

/**
 * Reservation controller.
 *
 */
class ReservationController extends Controller {

    /**
     * Lists all Reservation entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('ParkingBundle:Reservation')->findAll();

        return $this->render('ParkingBundle:Reservation:index.html.twig', array(
                    'reservations' => $reservations,
        ));
    }

    /**
     * Creates a new Reservation entity.
     *
     */
    public function newAction(Request $request) {
        $reservation = new Reservation();
        $form = $this->createForm('ParkingBundle\Form\ReservationType', $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('parking_reservation_show', array('id' => $reservation->getId()));
        }

        return $this->render('ParkingBundle:Reservation:new.html.twig', array(
                    'reservation' => $reservation,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Reservation entity.
     *
     */
    public function showAction(Reservation $reservation) {
        $deleteForm = $this->createDeleteForm($reservation);

        return $this->render('ParkingBundle:Reservation:show.html.twig', array(
                    'reservation' => $reservation,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Reservation entity.
     *
     */
    public function editAction(Request $request, Reservation $reservation) {
        $deleteForm = $this->createDeleteForm($reservation);
        $editForm = $this->createForm('ParkingBundle\Form\ReservationType', $reservation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('parking_reservation_edit', array('id' => $reservation->getId()));
        }

        return $this->render('ParkingBundle:Reservation:edit.html.twig', array(
                    'reservation' => $reservation,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Reservation entity.
     *
     */
    public function deleteAction(Request $request, Reservation $reservation) {
        $form = $this->createDeleteForm($reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservation);
            $em->flush();
        }

        return $this->redirectToRoute('parking_reservation_index');
    }

    /**
     * Creates a form to delete a Reservation entity.
     *
     * @param Reservation $reservation The Reservation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reservation $reservation) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('parking_reservation_delete', array('id' => $reservation->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
