<?php 

namespace App\DTO;

use App\Entity\Praticien;
use App\Entity\Patient;

class RdvDTO {
    private $id;
    private $dateRdv;
    private $adresse;
    private $patient;
    private $praticien;

    public function getId() :?int {
        return $this->id;
    }

    public function getDateRdv() :?\DateTimeInterface {
        return $this->dateRdv;
    }
    public function setDateRdv(?\DateTimeInterface $dateRdv) :self {
        $this->dateRdv = $dateRdv;
        return $this;
    }

    public function getAdresse() :?string {
        return $this->adresse;
    }
    public function setAdresse(?string $adresse) :self {
        $this->adresse = $adresse;
        return $this;
    }

    public function getPatient() :?int {
        return $this->patient;
    }
    public function setPatient(?int $idPatient) :self {
        $this->patient = $idPatient;
        return $this;
    }

    public function getPraticien() :?int {
        return $this->praticien;
    }
    public function setPraticien(?int $idPraticien) :self {
        $this->praticien = $idPraticien;
        return $this;
    }
}