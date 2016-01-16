<?php

namespace ParkingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ParkingBundle\Entity\Customer;
use ParkingBundle\Form\CustomerType;

class CrudController extends Controller {

    protected $entity;

    public function index() {
        $em = $this->getDoctrine()->getManager();

        $entityAll = $em->getRepository('ParkingBundle:' . $this->entity)->findAll();

        return $this->render('ParkingBundle:' . $this->entity . ':index.html.twig', array(
                    strtolower($this->entity) => $entityAll,
        ));
    }

    public function edit(request $request, $class) {
        $deleteForm = $this->createDeleteForm($class);
        $editForm = $this->createForm('ParkingBundle\Form\\' . $this->entity . 'Type', $class);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($class);
            $em->flush();

            return $this->redirectToRoute(strtolower($this->entity) . '_edit', array('id' => $customer->getId()));
        }

        return $this->render('ParkingBundle:' . $this->entity . ':edit.html.twig', array(
                    strtolower($this->entity) => $class,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    public function create(request $request, $class) {
        $form = $this->createForm('ParkingBundle\Form\\' . $this->entity . 'Type', $class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($class);
            $em->flush();

            return $this->redirectToRoute(strtolower($this->entity) . '_show', array('id' => $class->getId()));
        }

        return $this->render('ParkingBundle:' . $this->entity . ':new.html.twig', array(
                    strtolower($this->entity) => $class,
                    'form' => $form->createView(),
        ));
    }

    public function delete(Request $request, $class) {

        $form = $this->createDeleteForm($class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($class);
            $em->flush();
        }

        return $this->redirectToRoute(strtolower($this->entity) . '_index');
    }

    public function show($class) {
        $deleteForm = $this->createDeleteForm($class);

        return $this->render('ParkingBundle:' . $this->entity . ':show.html.twig', array(
                    strtolower($this->entity) => $class,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete an entity.
     *
     * @param $class the entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($class) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl(strtolower($this->entity) . '_delete', array('id' => $class->getId())))
                        ->setMethod('DELETE')
                        ->getForm();
    }

}
