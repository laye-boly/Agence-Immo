<?php

namespace App\Repository;

use App\Entity\Fonctionnalite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fonctionnalite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fonctionnalite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fonctionnalite[]    findAll()
 * @method Fonctionnalite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FonctionnaliteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fonctionnalite::class);
    }

    // /**
    //  * @return Fonctionnalite[] Returns an array of Fonctionnalite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fonctionnalite
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findSearchedFonctionnalite($search)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.fonctionnalite like :search')
            ->setParameter('search', '%'.$search.'%')
            ->getQuery()
            // ->getOneOrNullResult()
        ;
    }
}
