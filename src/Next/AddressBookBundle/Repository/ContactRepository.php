<?php

namespace Next\AddressBookBundle\Repository;
class ContactRepository extends \Doctrine\ORM\EntityRepository{
    
/*
    public function findByGroupe($groupe) {
        $dql = "SELECT a "
                ."FROM NextAddressBookBundle:Contact a "
                ."JOIN a.groupes c "
                ."WHERE c.nomgroupe = :catParam";
        $query = $this->_em->createQuery( $dql);
        $query->setParameter(":catParam",$groupe);
        return $query->getResult();
    }*/

public function findByGroupe($nomgroupe) {
$queryBuider = $this>
createQueryBuilder('l');
$queryBuider->join('l.nomgroupes', 'o', 'WITH', 'o.nomgroupe = :grpparam')
            ->setParameter('grpparam', $nomgroupe);
return $queryBuider->getQuery()->getResult();
}

/*
    public function findAllSociete() {
        $dql = "SELECT a "
                ."FROM NextAddressBookBundle:Societe a "
                ."JOIN a.societes c "
                ."WHERE c.nom = :catParam";
        $query = $this->_em->createQuery( $dql);
        $query->setParameter(":catParam",$societe);
        return $query->getResult();
    }
*/
/*
    public function findSociete($societe) {
        $dql = "SELECT a "
                ."FROM NextAddressBookBundle:Contact a "
                ."JOIN a.societes c "
                ."WHERE c.nom = :catParam";
        $query = $this->_em->createQuery( $dql);
        $query->setParameter(":catParam",$societe);
        return $query->getResult();
    }

 */
}
