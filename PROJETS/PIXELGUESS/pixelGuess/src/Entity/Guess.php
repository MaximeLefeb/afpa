<?php

namespace App\Entity;

use App\Repository\GuessRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GuessRepository::class)
 */
class Guess {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $img;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $keyword;

    public function getId():?int {
        return $this->id;
    }

    public function getImg():?string {
        return $this->img;
    }
    public function setImg(string $img):self {
        $this->img = $img;

        return $this;
    }

    public function getType():?string {
        return $this->type;
    }
    public function setType(string $type):self {
        $this->type = $type;

        return $this;
    }

    public function getKeyword():?string {
        return $this->keyword;
    }
    public function setKeyword(string $keyword):self {
        $this->keyword = $keyword;
        
        return $this;
    }
}
