<?php

namespace App\Repository;

use App\Entity\Cite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Cite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cite[]    findAll()
 * @method Cite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CiteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cite::class);
    }

    // /**
    //  * @return Cite[] Returns an array of Cite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cite
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findSearchedCite($search)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.titre like :search')
            ->setParameter('search', '%'.$search.'%')
            ->getQuery()
            // ->getOneOrNullResult()
        ;
    }
}
