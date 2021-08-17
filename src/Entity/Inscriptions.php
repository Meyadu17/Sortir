<?php

namespace App\Entity;

use App\Repository\InscriptionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionsRepository::class)
 */
class Inscriptions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_inscription;

    /**
     * @ORM\Column(type="integer")
     */
    private $sorties_no_sortie;

    /**
     * @ORM\Column(type="integer")
     */
    private $paticipants_no_participant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getSortiesNoSortie(): ?int
    {
        return $this->sorties_no_sortie;
    }

    public function setSortiesNoSortie(int $sorties_no_sortie): self
    {
        $this->sorties_no_sortie = $sorties_no_sortie;

        return $this;
    }

    public function getPaticipantsNoParticipant(): ?int
    {
        return $this->paticipants_no_participant;
    }

    public function setPaticipantsNoParticipant(int $paticipants_no_participant): self
    {
        $this->paticipants_no_participant = $paticipants_no_participant;

        return $this;
    }
}
