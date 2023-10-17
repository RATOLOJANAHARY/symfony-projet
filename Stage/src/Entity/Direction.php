<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DirectionRepository")
 */
class Direction
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
    private $CodeDirection;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $NomDirection;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeDirection(): ?string
    {
        return $this->CodeDirection;
    }

    public function setCodeDirection(string $CodeDirection): self
    {
        $this->CodeDirection = $CodeDirection;

        return $this;
    }

    public function getNomDirection(): ?string
    {
        return $this->NomDirection;
    }

    public function setNomDirection(string $NomDirection): self
    {
        $this->NomDirection = $NomDirection;

        return $this;
    }
}
