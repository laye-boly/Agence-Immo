<?php

namespace App\Repository;

use App\Entity\Immeuble;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Immeuble|null find($id, $lockMode = null, $lockVersion = null)
 * @method Immeuble|null findOneBy(array $criteria, array $orderBy = null)
 * @method Immeuble[]    findAll()
 * @method Immeuble[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImmeubleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Immeuble::class);
    }

    // /**
    //  * @return Immeuble[] Returns an array of Immeuble objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Immeuble
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    
    public function findSearchedImmeuble($search)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.titre like :search')
            ->setParameter('search', '%'.$search.'%')
            ->getQuery()
            // ->getOneOrNullResult()
        ;
    }
    
}
