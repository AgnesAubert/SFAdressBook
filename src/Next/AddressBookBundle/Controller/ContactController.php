<?php

namespace Next\AddressBookBundle\Controller;

use Next\AddressBookBundle\Entity\Contact;
use Next\AddressBookBundle\Form\ContactForm;
use Next\AddressBookBundle\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ContactController extends Controller
{
    public function listerAction()
    {
      $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Contact');
        $listeContacts = $repo->findAll();

        return $this->render('NextAddressBookBundle:Contact:lister.html.twig', array(
                  "listeContacts" => $listeContacts,
            "titrePage" => "Liste des contacts "
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
            $this->get("session")->getFlashBag()->add("success", "Le contact a bien été ajouté");
            return $this->redirect($this->generateUrl("next_addressbook_contact_lister"));
        }
         $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Contact');

        $listeContacts = $repo->findAll();
        return $this->render('NextAddressBookBundle:Contact:ajouter.html.twig', array(
             "form" => $form->createView() ,
            "listeContacts" => $listeContacts
            ));    }

    public function modifierAction(Contact $id = null, Request $request) {
        $em = $this->getDoctrine()->getManager();
    
        if (isset($id)) {
            // modification d'un acteur existant : on recherche ses données
            $contact = $em->find('NextAddressBookBundle:Contact', $id);
            if (!$contact) {
               // $message='Aucun acteur trouvé';
                $this->get("session")->getFlashBag()->add("success", "Aucun acteur trouvé");
            }
        }
        
         $form = $this->createForm(new ContactForm(), $id);
        $form->handleRequest($request);
        if ($form->isValid()) {

       //     $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            if (isset($id))
            {
            //$message='Contact modifié avec succès !';
            $this->get("session")->getFlashBag()->add("success", "Contact modifié avec succès !");
            }
            else
            {
            //$message='Contact ajouté avec succès !';
            $this->get("session")->getFlashBag()->add("success", "Contact ajouté avec succès !");
            }
           // return $this->redirect($this->generateUrl("next_addressbook_contact_lister"));
        }
           $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Contact');

        $listeContacts = $repo->findAll();
  
        return $this->render('NextAddressBookBundle:Contact:ajouter.html.twig', array(
                "form" => $form->createView(),
            "listeContacts" => $listeContacts,
            "modifier" => "ok"
            //'message' => $message
            ));    }
               
public function modifierMenuAction(Contact $contact, Request $request) {

        $form = $this->createForm(new ContactForm(), $contact);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $this->get("session")->getFlashBag()->add("success", "Les modifications ont été prises en compte");
                  }

        $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Contact');

        $listeContacts = $repo->findAll();

        return $this->render('NextAddressBookBundle:Contact:ajouter.html.twig', array(
            "form" => $form->createView(),
            "modifier" => "ok",
            "listeContacts" => $listeContacts
        ));
    }
    public function supprimerAction($id){
          $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('NextAddressBookBundle:Contact')->find($id);

        if (!$entity) {
            throw new NotFoundHttpException("Contact non trouvé");
        }

        $em->remove($entity);
        $em->flush();

        $this->get("session")->getFlashBag()->add("success", "La suppression a été prise en compte");

        return $this->redirect($this->generateUrl("next_addressbook_contact_lister"));   
        }

         
           
            
    public function listerParSocieteAction($societe)
    {
        return $this->render('NextAddressBookBundle:Contact:listerParSociete.html.twig', array(
                // ...
            ));    }

    public function listerParGroupeAction($nomgroupe)
    {
        $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Contact');
         /* @var $repo ContactRepository */
        $listeContacts = $repo->findByGroupe($nomgroupe);
      //  vardump($listeContacts);
        return $this->render('NextAddressBookBundle:Contact:lister.html.twig', array(
                    "listeContacts" => $listeContacts,
                    "titrePage" => "Liste des contacts par Groupe"
            ));    }

}
