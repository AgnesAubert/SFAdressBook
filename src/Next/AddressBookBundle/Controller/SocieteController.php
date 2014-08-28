<?php

namespace Next\AddressBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SocieteController extends Controller
{
    public function listerAction()
    {
        return $this->render('NextAddressBookBundle:Societe:lister.html.twig', array(
                // ...
            ));    }

    public function ajouterAction()
    {
        return $this->render('NextAddressBookBundle:Societe:ajouter.html.twig', array(
                // ...
            ));    }

    public function modifierAction($id)
    {
        return $this->render('NextAddressBookBundle:Societe:modifier.html.twig', array(
                // ...
            ));    }

}
