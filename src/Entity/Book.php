<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $actor = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 2000)]
    private ?string $sinopse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActor(): ?string
    {
        return $this->actor;
    }

    public function setActor(string $actor): static
    {
        $this->actor = $actor;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSinopse(): ?string
    {
        return $this->sinopse;
    }

    public function setSinopse(string $sinopse): static
    {
        $this->sinopse = $sinopse;

        return $this;
    }

    public function Jsonserialize(): mixed
    {
        return [
            "id" => $this->getId(),
        ];
    }
}
