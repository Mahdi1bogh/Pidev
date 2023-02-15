<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipantRepository::class)]
class Participant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateP = null;

    #[ORM\ManyToOne(inversedBy: 'participants')]
    private ?Tournois $tournois = null;

    #[ORM\ManyToOne(inversedBy: 'participants')]
    private ?User $users = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateP(): ?\DateTimeImmutable
    {
        return $this->dateP;
    }

    public function setDateP(\DateTimeImmutable $dateP): self
    {
        $this->dateP = $dateP;

        return $this;
    }

    public function getTournois(): ?Tournois
    {
        return $this->tournois;
    }

    public function setTournois(?Tournois $tournois): self
    {
        $this->tournois = $tournois;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }
}
