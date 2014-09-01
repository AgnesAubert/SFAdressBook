<?php

namespace Next\AddressBookBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe", uniqueConstraints={@ORM\UniqueConstraint(name="nomgroupe_UNIQUE", columns={"nomgroupe"})})
 * @ORM\Entity
 */
class Groupe {

    /**
     * @var string
     *
     * @ORM\Column(name="nomgroupe", type="string", length=30, nullable=false)
     * @ORM\Id
     */
    private $nomgroupe;

      
     /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="Contact", mappedBy="nomgroupes")
     */
    private $contacts;

    /**
     * Constructor
     */
    public function __construct() {
        $this->contacts = new ArrayCollection();
    }

    /**
     * Get nomgroupe
     *
     * @return string 
     */
    public function getNomgroupe() {
        return $this->nomgroupe;
    }

    public function setNomgroupe($nomgroupe) {
        $this->nomgroupe = $nomgroupe;

        return $this;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Groupe
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Add contacts
     *
     * @param Contact $contacts
     * @return Groupe
     */
    public function addContact(Contact $contacts) {
        $this->contacts[] = $contacts;

        return $this;
    }

    /**
     * Remove contacts
     *
     * @param Contact $contacts
     */
    public function removeContact(Contact $contacts) {
        $this->contacts->removeElement($contacts);
    }

    /**
     * Get contacts
     *
     * @return Collection 
     */
    public function getContacts() {
        return $this->contacts;
    }

    public function __toString() {
        return $this->nomgroupe;
    }

}
