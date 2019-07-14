<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServicesRepository")
 */
class Services
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
    private $Libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employers", mappedBy="services")
     */
    private $Employers;

    public function __construct()
    {
        $this->Employers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    /**
     * @return Collection|Employers[]
     */
    public function getEmployers(): Collection
    {
        return $this->Employers;
    }

    public function addEmployer(Employers $employer): self
    {
        if (!$this->Employers->contains($employer)) {
            $this->Employers[] = $employer;
            $employer->setServices($this);
        }

        return $this;
    }

    public function removeEmployer(Employers $employer): self
    {
        if ($this->Employers->contains($employer)) {
            $this->Employers->removeElement($employer);
            // set the owning side to null (unless already changed)
            if ($employer->getServices() === $this) {
                $employer->setServices(null);
            }
        }

        return $this;
    }
}
