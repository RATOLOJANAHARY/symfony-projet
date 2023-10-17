<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FonctionRepository")
 */
class Fonction
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
    private $NomFonction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFonction(): ?string
    {
        return $this->NomFonction;
    }

    public function setNomFonction(string $NomFonction): self
    {
        $this->NomFonction = $NomFonction;

        return $this;
    }
}
