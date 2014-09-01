<?php

namespace Next\AddressBookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
    //    parent::buildForm($builder, $options);
        $builder->add("nom")
                ->add("prenom")
                ->add("email")
                ->add("tel")
                ->add("save","submit");
    }


    public function getName() {
        return "ContactForm";
    }
}//put your code here
