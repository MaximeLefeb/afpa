<?php

namespace App\Repository;

use App\Entity\Guess;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Guess|null find($id, $lockMode = null, $lockVersion = null)
 * @method Guess|null findOneBy(array $criteria, array $orderBy = null)
 * @method Guess[]    findAll()
 * @method Guess[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuessRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Guess::class);
    }

    // /**
    //  * @return Guess[] Returns an array of Guess objects
    //  */
    /*
    public function findByExampleField($value) {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value):?Guess {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
