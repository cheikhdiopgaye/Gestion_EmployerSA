<?php

namespace App\Entity;

class EmployerSearch
{
    /**
     * @string/null
     */
    private $Matricule;

    public function getMatricule(): ?string
    {
        return $this->Matricule;
    }

    public function setMatricule(string $Matricule): self
    {
        $this->Matricule = $Matricule;

        return $this;
    }
}
