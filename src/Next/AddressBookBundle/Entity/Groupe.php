<?php

namespace Next\AddressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe", uniqueConstraints={@ORM\UniqueConstraint(name="nomgroupe_UNIQUE", columns={"nomgroupe"})})
 * @ORM\Entity
 */
class Groupe
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomgroupe", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nomgroupe;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Contact", mappedBy="groupeNomgroupe")
     */
    private $contactcontact;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contactcontact = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get nomgroupe
     *
     * @return string 
     */
    public function getNomgroupe()
    {
        return $this->nomgroupe;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Groupe
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add contactcontact
     *
     * @param \Next\AddressBookBundle\Entity\Contact $contactcontact
     * @return Groupe
     */
    public function addContactcontact(\Next\AddressBookBundle\Entity\Contact $contactcontact)
    {
        $this->contactcontact[] = $contactcontact;

        return $this;
    }

    /**
     * Remove contactcontact
     *
     * @param \Next\AddressBookBundle\Entity\Contact $contactcontact
     */
    public function removeContactcontact(\Next\AddressBookBundle\Entity\Contact $contactcontact)
    {
        $this->contactcontact->removeElement($contactcontact);
    }

    /**
     * Get contactcontact
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactcontact()
    {
        return $this->contactcontact;
    }
}
