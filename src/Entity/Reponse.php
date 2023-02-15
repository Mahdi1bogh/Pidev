<?php

namespace App\Entity;

use App\Repository\ReponseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseRepository::class)]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reponses')]
    private ?Reclamation $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?Reclamation
    {
        return $this->description;
    }

    public function setDescription(?Reclamation $description): self
    {
        $this->description = $description;

        return $this;
    }
}
