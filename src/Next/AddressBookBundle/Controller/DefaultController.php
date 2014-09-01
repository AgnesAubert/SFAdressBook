<?php

namespace Next\AddressBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NextAddressBookBundle:Default:index.html.twig', array('name' => $name));
    }
}
