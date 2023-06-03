<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(nullable: true)]
    private ?int $note = null;

    public function getId():?int {
        return $this->id;
    }

    public function getName():?string {
        return $this->name;
    }
    public function setName(string $name):self {
        $this->name = $name;

        return $this;
    }

    public function getDescription():?string {
        return $this->description;
    }
    public function setDescription(?string $description):self {
        $this->description = $description;

        return $this;
    }

    public function getQuantity():?int {
        return $this->quantity;
    }
    public function setQuantity(int $quantity):self {
        $this->quantity = $quantity;

        return $this;
    }

    public function getNote():?int {
        return $this->note;
    }
    public function setNote(?int $note):self {
        $this->note = $note;

        return $this;
    }
}
