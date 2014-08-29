<?php

namespace Next\AddressBookBundle\Controller;

use Next\AddressBookBundle\Entity\Societe;
use Next\AddressBookBundle\Form\SocieteForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SocieteController extends Controller {

    public function listerAction() {
        $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Societe');

        $listeSocietes = $repo->findAll();

        return $this->render('NextAddressBookBundle:Societe:lister.html.twig', array(
                    "listeSocietes" => $listeSocietes
        ));
    }

    public function ajouterAction(Request $request) {
        
        $societe = $this->get("next_addressbook.societe");
        $form = $this->createForm("SocieteForm", $societe);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($societe);
            $em->flush();

            $this->get("session")->getFlashBag()->add("success", "La société a bien été créée");

            return $this->redirect($this->generateUrl("next_addressbook_societe_lister"));
        }

        $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Societe');

        $listeSocietes = $repo->findAll();

        return $this->render('NextAddressBookBundle:Societe:ajouter.html.twig', array(
                    "form" => $form->createView(),
                    "listeSocietes" => $listeSocietes
        ));
    }

    public function modifierAction(Societe $societe, Request $request) {

        $form = $this->createForm(new SocieteForm(), $societe);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($societe);
            $em->flush();

            $this->get("session")->getFlashBag()->add("success", "Les modifications ont été prises en compte");
            return $this->redirect($this->generateUrl("next_addressbook_societe_lister"));
        }

        $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Societe');

        $listeSocietes = $repo->findAll();

        return $this->render('NextAddressBookBundle:Societe:ajouter.html.twig', array(
            "form" => $form->createView(),
            "modifier" => "ok",
            "listeSocietes" => $listeSocietes
        ));
    }
public function modifierMenuAction(Societe $societe, Request $request) {

        $form = $this->createForm(new SocieteForm(), $societe);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($societe);
            $em->flush();

            $this->get("session")->getFlashBag()->add("success", "Les modifications ont été prises en compte");
                  }

        $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Societe');

        $listeSocietes = $repo->findAll();

        return $this->render('NextAddressBookBundle:Societe:ajouter.html.twig', array(
            "form" => $form->createView(),
            "modifier" => "ok",
            "listeSocietes" => $listeSocietes
        ));
    }
    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('NextAddressBookBundle:Societe')->find($id);

        if (!$entity) {
            throw new NotFoundHttpException("Société non trouvée");
        }

        $em->remove($entity);
        $em->flush();

        $this->get("session")->getFlashBag()->add("success", "La suppression a été prise en compte");

        return $this->redirect($this->generateUrl("next_addressbook_societe_lister"));
    }

}
