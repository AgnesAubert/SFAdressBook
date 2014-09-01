<?php

namespace Next\AddressBookBundle\Form;

use Doctrine\ORM\EntityRepository;
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
                ->add('societe','entity',
                        array('class' => 'NextAddressBookBundle:Societe',
                     'query_builder'=> function(EntityRepository $er ) {
                     
                 
			    return $er->createQueryBuilder('u')
					->orderBy('u.nom', 'ASC');
			} ))  
                       
               ->add('nomgroupes','entity',
                        array('class' => 'NextAddressBookBundle:Groupe',
                     'query_builder'=> function(EntityRepository $er) { 
			    return $er->createQueryBuilder('u')
					->orderBy('u.nomgroupe', 'ASC');
			}, 'multiple' => true))      
                      
       /*         ->add("nomgroupes")        
          */       
                ->add("save","submit");
    }


    public function getName() {
        return "ContactForm";
    }
}//put your code here
