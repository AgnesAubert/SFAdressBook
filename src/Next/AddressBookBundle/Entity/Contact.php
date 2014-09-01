<?php

namespace Next\AddressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact", uniqueConstraints={@ORM\UniqueConstraint(name="idcontact_UNIQUE", columns={"idcontact"})}, indexes={@ORM\Index(name="fk_contact_societe1_idx", columns={"idsociete"})})
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcontact", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcontact;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=45, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=10, nullable=true)
     */
    private $tel;

    /**
     * @var \Societe
     *
     * @ORM\ManyToOne(targetEntity="Societe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idsociete", referencedColumnName="idsociete")
     * })
     */
    private $societe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Groupe", inversedBy="contacts")
     * @ORM\JoinTable(name="contact_has_groupe",
     *   joinColumns={
     *     @ORM\JoinColumn(name="contact_idcontact", referencedColumnName="idcontact")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="groupe_nomgroupe", referencedColumnName="nomgroupe")
     *   }
     * )
     */
    private $nomgroupes;

   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nomgroupes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idcontact
     *
     * @return integer 
     */
    public function getIdcontact()
    {
        return $this->idcontact;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Contact
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    public function getSociete() {
        return $this->societe;
    }

    public function setSociete(Societe $societe) {
        $this->societe = $societe;
    }

        /**
     * Add nomgroupes
     *
     * @param \Next\AddressBookBundle\Entity\Groupe $nomgroupes
     * @return Contact
     */
    public function addNomgroupe(\Next\AddressBookBundle\Entity\Groupe $nomgroupes)
    {
        $this->nomgroupes[] = $nomgroupes;

        return $this;
    }

    /**
     * Remove nomgroupes
     *
     * @param \Next\AddressBookBundle\Entity\Groupe $nomgroupes
     */
    public function removeNomgroupe(\Next\AddressBookBundle\Entity\Groupe $nomgroupes)
    {
        $this->nomgroupes->removeElement($nomgroupes);
    }

    /**
     * Get nomgroupes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNomgroupes()
    {
        return $this->nomgroupes;
    }
}
