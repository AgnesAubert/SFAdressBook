<?php

namespace Next\AddressBookBundle\Repository;
class ContactRepository extends \Doctrine\ORM\EntityRepository{
    public function findByGroupe($groupe) {
        $dql = "SELECT a "
                ."FROM NextAddressBookBundle:Nom a "
                ."JOIN a.groupes c "
                ."WHERE c.nom = :catParam";
        $query = $this->_em->createQuery( $dql);
        $query->setParameter(":catParam",$groupe);
        return $query->getResult();
    }
}
