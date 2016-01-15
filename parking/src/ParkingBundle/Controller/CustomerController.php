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
class CustomerController extends Controller {

    /**
     * Lists all Customer entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $customers = $em->getRepository('ParkingBundle:Customer')->findAll();

        return $this->render('ParkingBundle:Customer:index.html.twig', array(
                    'customers' => $customers,
        ));
    }

    /**
     * Creates a new Customer entity.
     *
     */
    public function newAction(Request $request) {
        $customer = new Customer();
        $form = $this->createForm('ParkingBundle\Form\CustomerType', $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();

            return $this->redirectToRoute('customer_show', array('id' => $customer->getId()));
        }

        return $this->render('ParkingBundle:Customer:new.html.twig', array(
                    'customer' => $customer,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Customer entity.
     *
     */
    public function showAction(Customer $customer) {
        $deleteForm = $this->createDeleteForm($customer);

        return $this->render('ParkingBundle:Customer:show.html.twig', array(
                    'customer' => $customer,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Customer entity.
     *
     */
    public function editAction(Request $request, Customer $customer) {
        $deleteForm = $this->createDeleteForm($customer);
        $editForm = $this->createForm('ParkingBundle\Form\CustomerType', $customer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();

            return $this->redirectToRoute('customer_edit', array('id' => $customer->getId()));
        }

        return $this->render('ParkingBundle:Customer:edit.html.twig', array(
                    'customer' => $customer,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Customer entity.
     *
     */
    public function deleteAction(Request $request, Customer $customer) {
        $form = $this->createDeleteForm($customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($customer);
            $em->flush();
        }

        return $this->redirectToRoute('customer_index');
    }

    /**
     * Creates a form to delete a Customer entity.
     *
     * @param Customer $customer The Customer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Customer $customer) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('customer_delete', array('id' => $customer->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
