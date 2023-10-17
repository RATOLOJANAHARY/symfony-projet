<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnelRepository")
 */
class Personnel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $Sexe;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $NumMatricule;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNaissance;

    /**
     * @ORM\Column(type="date")
     */
    private $DateAffectation;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $Categorie;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Indice;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Classe;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Echellon;

    /**
     * @ORM\Column(type="date")
     */
    private $DateEffetDernier;

    /**
     * @ORM\Column(type="date")
     */
    private $DateEntre;
     /**
     * @ORM\ManyToOne(targetEntity="Service", inversedBy="Personnel")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id")
     */
    private $service;
     /**
     * @ORM\ManyToOne(targetEntity="Fonction", inversedBy="Personnel")
     * @ORM\JoinColumn(name="fonction_id", referencedColumnName="id")
     */
    private $fonction;
     /**
     * @ORM\ManyToOne(targetEntity="Grade", inversedBy="Personnel")
     * @ORM\JoinColumn(name="grade_id", referencedColumnName="id")
     */
    private $grade;
     /**
     * @ORM\ManyToOne(targetEntity="Diplome", inversedBy="Personnel")
     * @ORM\JoinColumn(name="diplome_id", referencedColumnName="id")
     */
    private $diplome;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $CIN;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getNumMatricule(): ?string
    {
        return $this->NumMatricule;
    }

    public function setNumMatricule(string $NumMatricule): self
    {
        $this->NumMatricule = $NumMatricule;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->DateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $DateNaissance): self
    {
        $this->DateNaissance = $DateNaissance;

        return $this;
    }

    public function getDateAffectation(): ?\DateTimeInterface
    {
        return $this->DateAffectation;
    }

    public function setDateAffectation(\DateTimeInterface $DateAffectation): self
    {
        $this->DateAffectation = $DateAffectation;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->Categorie;
    }

    public function setCategorie(string $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function getIndice(): ?string
    {
        return $this->Indice;
    }

    public function setIndice(string $Indice): self
    {
        $this->Indice = $Indice;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->Classe;
    }

    public function setClasse(string $Classe): self
    {
        $this->Classe = $Classe;

        return $this;
    }

    public function getEchellon(): ?string
    {
        return $this->Echellon;
    }

    public function setEchellon(string $Echellon): self
    {
        $this->Echellon = $Echellon;

        return $this;
    }

    public function getDateEffetDernier(): ?\DateTimeInterface
    {
        return $this->DateEffetDernier;
    }

    public function setDateEffetDernier(\DateTimeInterface $DateEffetDernier): self
    {
        $this->DateEffetDernier = $DateEffetDernier;

        return $this;
    }

    public function getDateEntre(): ?\DateTimeInterface
    {
        return $this->DateEntre;
    }

    public function setDateEntre(\DateTimeInterface $DateEntre): self
    {
        $this->DateEntre = $DateEntre;

        return $this;
    }
    /**
     * Set service
     *
     * @param App\Entity\Service $service
     *
     * @return Service
     */
    public function setService( $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return App\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }
    
    /**
     * Set fonction
     *
     * @param App\Entity\Fonction $fonction
     *
     * @return Fonction
     */
    public function setFonction( $fonction = null)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return App\Entity\Fonction
     */
    public function getFonction()
    {
        return $this->fonction;
    }
    /**
     * Set grade
     *
     * @param App\Entity\Grade $grade
     *
     * @return Grade
     */
    public function setGrade( $grade = null)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return App\Entity\Grade
     */
    public function getGrade()
    {
        return $this->grade;
    }
    /**
     * Set diplome
     *
     * @param App\Entity\Diplome $diplome
     *
     * @return Diplome
     */
    public function setDiplome( $diplome = null)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return App\Entity\Diplome
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    public function getCIN(): ?string
    {
        return $this->CIN;
    }

    public function setCIN(string $CIN): self
    {
        $this->CIN = $CIN;

        return $this;
    }
    
}
