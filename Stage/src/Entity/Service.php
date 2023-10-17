<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
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
    private $codeservice;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nomservice;
    /**
     * @ORM\ManyToOne(targetEntity="Direction", inversedBy="Service")
     * @ORM\JoinColumn(name="direction_id", referencedColumnName="id")
     */
    private $direction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeservice(): ?string
    {
        return $this->codeservice;
    }

    public function setCodeservice(string $codeservice): self
    {
        $this->codeservice = $codeservice;

        return $this;
    }

    public function getNomservice(): ?string
    {
        return $this->nomservice;
    }

    public function setNomservice(string $nomservice): self
    {
        $this->nomservice = $nomservice;

        return $this;
    }

    /**
     * Set direction
     *
     * @param App\Entity\Direction $direction
     *
     * @return Direction
     */
    public function setDirection( $direction = null)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Get direction
     *
     * @return App\Entity\Direction
     */
    public function getDirection()
    {
        return $this->direction;
    }
}
