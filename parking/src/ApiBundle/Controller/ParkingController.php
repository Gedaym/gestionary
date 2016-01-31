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
 */
class ParkingController extends Controller
{
    /**
     * @Route("/parkings")
     * @Method("GET")
     */
    public function indexAction()
    {
        $encoders = array('json' => new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $repository = $this ->getDoctrine()->getRepository('ParkingBundle:Parking');
        $parkings = $repository->findAll();
        $jsonParkings = $serializer->serialize($parkings, 'json');
        return new Response($jsonParkings);
    }

    /**
     * @Route("/parkings/{id}")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $encoders = array('json' => new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $repository = $this ->getDoctrine()->getRepository('ParkingBundle:Parking');
        $parkings = $repository->findOneByParkingId($id);
        $jsonParkings = $serializer->serialize($parkings, 'json');
        return new Response($jsonParkings);
    }

    /**
     * @Route("/parkings/{id}")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $encoders = array('json' => new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();
        $parkings = $this ->getDoctrine()->getRepository('ParkingBundle:Parking')->find($id);
        $em->remove($parkings);
        $em->flush();
        $jsonParkings = $serializer->serialize('success', 'json');
        return new Response($jsonParkings);
    }
}
