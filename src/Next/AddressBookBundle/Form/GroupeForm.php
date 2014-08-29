<?php

namespace Next\AddressBookBundle\Form;

class GroupeForm extends \Symfony\Component\Form\AbstractType {

    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
        $builder->add("nomgroupe")
                ->add("description");
    }

    public function getName() {
        return "GroupeForm";
    }
}   