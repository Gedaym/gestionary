<?php

namespace ParkingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ParkingBundle:Default:index.html.twig');
    }
}
