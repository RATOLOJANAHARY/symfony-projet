<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GradeRepository")
 */
class Grade
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
    private $CodeGrade;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $NomGrade;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeGrade(): ?string
    {
        return $this->CodeGrade;
    }

    public function setCodeGrade(string $CodeGrade): self
    {
        $this->CodeGrade = $CodeGrade;

        return $this;
    }

    public function getNomGrade(): ?string
    {
        return $this->NomGrade;
    }

    public function setNomGrade(string $NomGrade): self
    {
        $this->NomGrade = $NomGrade;

        return $this;
    }
}
