<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployersRepository")
 */
class Employers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url(
     * message = " L'Url {{ value }}' que vous avez saisi n'est pas valide ",
     * )
     */
    private $Photo;

    /**
     * @ORM\Column(type="text")
     */
    private $Matricule;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(
     *      min = 2,
     *      max = 10)
     */
    private $Nom;

    /**
     * @ORM\Column(type="date")
     */
    private $Naissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $Salaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Services", inversedBy="Employers")
     */
    private $services;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->Photo;
    }

    public function setPhoto(string $Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->Matricule;
    }

    public function setMatricule(string $Matricule): self
    {
        $this->Matricule = $Matricule;

        return $this;
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

    public function getNaissance(): ?\DateTimeInterface
    {
        return $this->Naissance;
    }

    public function setNaissance(\DateTimeInterface $Naissance): self
    {
        $this->Naissance = $Naissance;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->Salaire;
    }

    public function setSalaire(int $Salaire): self
    {
        $this->Salaire = $Salaire;

        return $this;
    }

    public function getServices(): ?Services
    {
        return $this->services;
    }

    public function setServices(?Services $services): self
    {
        $this->services = $services;

        return $this;
    }
}
