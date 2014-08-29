<?php

namespace Next\AddressBookBundle\Controller;

use Next\AddressBookBundle\Entity\Groupe;
use Next\AddressBookBundle\Form\GroupeForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GroupeController extends Controller {

    public function listerAction() {
        $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Groupe');
        $listeGroupes = $repo->findAll();

        return $this->render('NextAddressBookBundle:Groupe:lister.html.twig', array(
                    "listeGroupes" => $listeGroupes
        ));
    }

    public function ajouterAction(Request $request) {
        $groupe = $this->get("next_addressbook.groupe");
        $form = $this->createForm("GroupeForm", $groupe);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupe);
            $em->flush();

            $this->get("session")->getFlashBag()->add("success", "Le groupe a bien été créé");

            return $this->redirect($this->generateUrl("next_addressbook_groupe_lister"));
        }

        $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Groupe');

        $listeGroupes = $repo->findAll();

        return $this->render('NextAddressBookBundle:Groupe:ajouter.html.twig', array(
                    "form" => $form->createView(),
                    "listeGroupes" => $listeGroupes
        ));
    }

    public function modifierAction(Groupe $groupe, Request $request) {
        $form = $this->createForm(new GroupeForm(), $groupe);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupe);
            $em->flush();

            $this->get("session")->getFlashBag()->add("success", "Les modifications ont été prises en compte");
            return $this->redirect($this->generateUrl("next_addressbook_groupe_lister"));
        }

        $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Groupe');
        $listeGroupes = $repo->findAll();

        return $this->render('NextAddressBookBundle:Groupe:ajouter.html.twig', array(
                    "form" => $form->createView(),
                    "modifier" => "ok",
                    "listeGroupes" => $listeGroupes
        ));
    }

    public function modifierMenuAction(Groupe $groupe, Request $request) {

        $form = $this->createForm(new GroupeForm(), $groupe);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupe);
            $em->flush();

            $this->get("session")->getFlashBag()->add("success", "Les modifications ont été prises en compte");
        }

        $repo = $this->getDoctrine()->getRepository('NextAddressBookBundle:Groupe');

        $listeGroupes = $repo->findAll();

        return $this->render('NextAddressBookBundle:Groupe:ajouter.html.twig', array(
                    "form" => $form->createView(),
                    "modifier" => "ok",
                    "listeGroupes" => $listeGroupes
        ));
    }

    public function supprimerAction($nomgroupe) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('NextAddressBookBundle:Groupe')->find($nomgroupe);

        if (!$entity) {
            throw new NotFoundHttpException("Groupe non trouve");
        }

        $em->remove($entity);
        $em->flush();

        $this->get("session")->getFlashBag()->add("success", "La suppression a été prise en compte");

        return $this->redirect($this->generateUrl("next_addressbook_groupe_lister"));
    }

}
