<?php 

namespace App\Service;

use App\Entity\Patient;
use App\Entity\Praticien;
use App\Mapper\PatientMapper;
use App\Mapper\PraticienMapper;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Exception\DriverException;
use App\Service\Exception\UserServiceException;

class UserService {
    private $repository;
    private $entityManager;
    private $patientMapper;
    private $praticienMapper;

    public function __construct(UserRepository $repo, EntityManagerInterface $entityManager, PatientMapper $patientMapper, PraticienMapper $praticienMapper) {
        $this->repository      = $repo;
        $this->entityManager   = $entityManager;
        $this->patientMapper   = $patientMapper;
        $this->praticienMapper = $praticienMapper;
    }

    public function searchByEmail(String $mail) {
        try {
            $user = $this->repository->findOneBy(['email' => $mail]);
            
            if ($user instanceof Patient) {
                return $this->patientMapper->transform_Patient_To_PatientDTO($user);
            } else if ($user instanceof Praticien) {
                return $this->praticienMapper->transform_Praticien_To_PraticienDTO($user);
            }
        } catch(DriverException $e){
            throw new UserServiceException("Un problème est technique est servenu. Veuilllez réessayer ultérieurement.", $e->getCode());
        }
    }
}