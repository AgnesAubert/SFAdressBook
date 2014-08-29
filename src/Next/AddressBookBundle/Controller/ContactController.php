<?php

namespace Next\AddressBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends Controller
{
    public function listerAction()
    {
      $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Contact');
        $listeContacts = $repo->findAll();

        return $this->render('NextAddressBookBundle:Contact:lister.html.twig', array(
                  "listeContacts" => $listeContacts
            ));    }

    public function ajouterAction(Request $request)
    {
       $contact = $this->get("next_AddressBook.contact");
       $form = $this->createForm("ContactForm", $contact);
       $form->handleRequest($request);
       
       if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
           $em->flush();
            $this->get("session")->getFlashBag()->add("success", "Le contact a bien été ajoutée");
            return $this->redirect($this->generateUrl("next_addressbook_contact_ajouter"));
        }
        return $this->render('NextAddressBookBundle:Contact:ajouter.html.twig', array(
             "form" => $form->createView() 
            ));    }

    public function modifierAction($idcontact)
    {
        return $this->render('NextAddressBookBundle:Contact:modifier.html.twig', array(
                // ...
            ));    }

    public function supprimerAction($idcontact)
    {
        return $this->render('NextAddressBookBundle:Contact:supprimer.html.twig', array(
                // ...
            ));    }

    public function listerParSocieteAction($idsociete)
    {
        return $this->render('NextAddressBookBundle:Contact:listerParSociete.html.twig', array(
                // ...
            ));    }

    public function listerParGroupeAction($nomgroupe)
    {
        return $this->render('NextAddressBookBundle:Contact:listerParGroupe.html.twig', array(
                // ...
            ));    }

}
