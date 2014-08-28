<?php

namespace Next\AddressBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SocieteController extends Controller
{
    public function listerAction()
    {
        return $this->render('NextAddressBookBundle:Societe:lister.html.twig', array(
                // ...
            ));    }

    public function ajouterAction(Request $request)
    {
        $societe = $this->get("next_addressbook.societe");
        $form = $this->createForm("SocieteForm", $societe);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($societe);
            $em->flush();

            $this->get("session")->getFlashBag()->add("success", "La société a bien été créée");

            return $this->redirect($this->generateUrl("next_address_book_societe_lister"));
        }

        return $this->render('NextAddressBookBundle:Societe:ajouter.html.twig', array(
                "form" => $form->createView()
            ));    }

    public function modifierAction($id)
    {
        return $this->render('NextAddressBookBundle:Societe:modifier.html.twig', array(
                // ...
            ));    }

}
