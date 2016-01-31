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
class OfferController extends Controller
{
    /**
     * @Route("/offers")
     * @Method("GET")
     */
    public function indexAction()
    {
        $encoders = array('json' => new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $repository = $this ->getDoctrine()->getRepository('ParkingBundle:Offer');
        $offer = $repository->findAll();
        $jsonOffer = $serializer->serialize($offer, 'json');
        return new Response($jsonOffer);
    }

    /**
     * @Route("/offers/{id}")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $encoders = array('json' => new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $repository = $this ->getDoctrine()->getRepository('ParkingBundle:Offer');
        $offer = $repository->findOneByOfferId($id);
        $jsonOffer = $serializer->serialize($offer, 'json');
        return new Response($jsonOffer);
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
        $offer = $this ->getDoctrine()->getRepository('ParkingBundle:Offer')->find($id);
        $em->remove($offer);
        $em->flush();
        $jsonOffers = $serializer->serialize('success', 'json');
        return new Response($jsonOffers);
    }

}
