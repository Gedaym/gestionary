<?php

namespace Parking\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ParkingUserBundle:Default:index.html.twig');
    }
}
