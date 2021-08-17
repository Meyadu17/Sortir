<?php

namespace App\Entity;

use App\Repository\VILLESRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VILLESRepository::class)
 */
class VILLES
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $no_ville;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom_ville;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $code_postal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoVille(): ?int
    {
        return $this->no_ville;
    }

    public function setNoVille(int $no_ville): self
    {
        $this->no_ville = $no_ville;

        return $this;
    }

    public function getNomVille(): ?string
    {
        return $this->nom_ville;
    }

    public function setNomVille(string $nom_ville): self
    {
        $this->nom_ville = $nom_ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }
}
