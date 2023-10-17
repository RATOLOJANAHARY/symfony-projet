<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiplomeRepository")
 */
class Diplome
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $NomDiplome;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDiplome(): ?string
    {
        return $this->NomDiplome;
    }

    public function setNomDiplome(string $NomDiplome): self
    {
        $this->NomDiplome = $NomDiplome;

        return $this;
    }
}
