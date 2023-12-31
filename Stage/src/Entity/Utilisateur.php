<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 * @UniqueEntity(fields="email", message="This email is already taken.")
 * @UniqueEntity(fields="username", message="This username is already taken.")
 * @ORM\HasLifecycleCallbacks()
 */
class Utilisateur implements UserInterface, \Serializable
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
    private $username;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @var array
     *
     * @ORM\Column(type="string")
     */
    private $roles = [];
    /**
     * @var Datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $last_login;

    /**
     * @var Datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;
  
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


   
    /**
     *
     * @return App\Entity\Serviceok
     */
    public function getServiceok()
    {
        return $this->serviceok;
    }

     public function getRoles(): array
    {
        $roles = $this->roles;

        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }
     public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
        //
    }
    public function serialize(): string
    {
        return serialize([$this->id, $this->username, $this->password]);
    }

    public function unserialize($serialized): void
    {
        [$this->id, $this->username, $this->password] = unserialize($serialized, ['allowed_classes' => false]);
    }

    public function getLastLogin()
    {
        return $this->last_login;
    }

    public function setLastLogin($last_login): void
    {
        $this->last_login = $last_login;
    }

    public function getCreatedAt(): Datetime
    {
        return $this->created_at;
    }

    public function setCreatedAt(Datetime $created_at = null): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->created_at = new Datetime();
    }
}
