<?php

namespace Next\AddressBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GroupeController extends Controller
{
    public function listerAction()
    {
        return $this->render('NextAddressBookBundle:Groupe:lister.html.twig', array(
                // ...
            ));    }

    public function ajouterAction()
    {
        return $this->render('NextAddressBookBundle:Groupe:ajouter.html.twig', array(
                // ...
            ));    }

    public function modifierAction($id)
    {
        return $this->render('NextAddressBookBundle:Groupe:ajouter.html.twig', array(
                // ...
            ));    }

}
