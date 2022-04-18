<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $Prenom;

    #[ORM\Column(type: 'string', length: 255)]
    private $Adresse;

    #[ORM\Column(type: 'string', length: 255)]
    private $Formation;

    #[ORM\Column(type: 'string', length: 255)]
    private $Date_Naissance;

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

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getFormation(): ?string
    {
        return $this->Formation;
    }

    public function setFormation(string $Formation): self
    {
        $this->Formation = $Formation;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->Date_Naissance;
    }

    public function setDateNaissance(string $Date_Naissance): self
    {
        $this->Date_Naissance = $Date_Naissance;

        return $this;
    }
}
