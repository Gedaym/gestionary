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
class ParkingController extends Controller
{
    /**
     * Lists all Parking entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parkings = $em->getRepository('ParkingBundle:Parking')->findAll();
        
        foreach ($parkings as $parking){
            $listParking[$parking->getParkingId()]["name"] = $parking->getParkingName();
            $listParking[$parking->getParkingId()]["number"] = $parking->getParkingNumberStreet();
            $listParking[$parking->getParkingId()]["street"] = $parking->getParkingStreet();
            $listParking[$parking->getParkingId()]["city"] = $parking->getParkingCity();
            $listParking[$parking->getParkingId()]["cp"] = $parking->getParkingPostalCode();
            //$listParking[$parking->parkingId][type] = $parking->parkingDescription;
            $listParking[$parking->getParkingId()]["description"] = $parking->getParkingDescription();
        }
        
        $response = json_encode($listParking);
        
        var_dump($response); die();

        return json_decode($response);
        
    }

    /**
     * Creates a new Parking entity.
     *
     */
    public function newAction(Request $request)
    {
        $parking = new Parking();
        $form = $this->createForm('ParkingBundle\Form\ParkingType', $parking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parking);
            $em->flush();

            return $this->redirectToRoute('parking_show', array('id' => $parking->getId()));
        }

        return $this->render('parking/new.html.twig', array(
            'parking' => $parking,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Parking entity.
     *
     */
    public function showAction(Parking $parking)
    {
        $deleteForm = $this->createDeleteForm($parking);

        return $this->render('parking/show.html.twig', array(
            'parking' => $parking,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Parking entity.
     *
     */
    public function editAction(Request $request, Parking $parking)
    {
        $deleteForm = $this->createDeleteForm($parking);
        $editForm = $this->createForm('ParkingBundle\Form\ParkingType', $parking);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parking);
            $em->flush();

            return $this->redirectToRoute('parking_edit', array('id' => $parking->getId()));
        }

        return $this->render('parking/edit.html.twig', array(
            'parking' => $parking,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Parking entity.
     *
     */
    public function deleteAction(Request $request, Parking $parking)
    {
        $form = $this->createDeleteForm($parking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($parking);
            $em->flush();
        }

        return $this->redirectToRoute('parking_index');
    }

    /**
     * Creates a form to delete a Parking entity.
     *
     * @param Parking $parking The Parking entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Parking $parking)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parking_delete', array('id' => $parking->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
