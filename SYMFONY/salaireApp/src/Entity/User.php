<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function getId():?int {
        return $this->id;
    }

    public function getMail():?string {
        return $this->mail;
    }
    public function setMail(string $mail):self {
        $this->mail = $mail;
        return $this;
    }

    public function getNom():?string {
        return $this->nom;
    }
    public function setNom(?string $nom):self {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom():?string {
        return $this->prenom;
    }
    public function setPrenom(?string $prenom):self {
        $this->prenom = $prenom;
        return $this;
    }

    public function getPassword():?string {
        return $this->password;
    }
    public function setPassword(string $password):self {
        $this->password = $password;
        return $this;
    }
}
