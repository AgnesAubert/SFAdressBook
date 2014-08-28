<?php
namespace Next\AddressBookBundle\Form;

 
class SocieteForm extends \Symfony\Component\Form\AbstractType {
    
     public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
        $builder->add("nom")
                ->add("adresse")
                ->add("cp")
                ->add("ville")
                ->add("save", "submit");
        
    }
    
    public function getName() {
       return "SocieteForm";
    }

 
}
