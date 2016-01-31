<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

/**
 * @Route("/api")
 *
 */
class ReservationController extends Controller
{
    /**
     * @Route("/reservations")
     * @Method("GET")
     */
    public function indexAction()
    {
        $encoders = array('json' => new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $repository = $this ->getDoctrine()->getRepository('ParkingBundle:Reservation');
        $reservations = $repository->findAll();
        $jsonReservations = $serializer->serialize($reservations, 'json');
        return new Response($jsonReservations);
    }

    /**
     * @Route("/reservations/{id}")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $encoders = array('json' => new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $repository = $this ->getDoctrine()->getRepository('ParkingBundle:Reservation');
        $reservations = $repository->findOneByReservationId($id);
        $jsonReservations = $serializer->serialize($reservations, 'json');
        return new Response($jsonReservations);
    }

    /**
     * @Route("/offers/{id}")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $encoders = array('json' => new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();
        $reservations = $this ->getDoctrine()->getRepository('ParkingBundle:Reservation')->find($id);
        $em->remove($reservations);
        $em->flush();
        $jsonReservations = $serializer->serialize('success', 'json');
        return new Response($jsonReservations);
    }
}
