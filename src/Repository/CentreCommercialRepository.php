<?php

namespace App\Repository;

use App\Entity\CentreCommercial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CentreCommercial|null find($id, $lockMode = null, $lockVersion = null)
 * @method CentreCommercial|null findOneBy(array $criteria, array $orderBy = null)
 * @method CentreCommercial[]    findAll()
 * @method CentreCommercial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentreCommercialRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CentreCommercial::class);
    }

    // /**
    //  * @return CentreCommercial[] Returns an array of CentreCommercial objects
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
    public function findOneBySomeField($value): ?CentreCommercial
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findSearchedCentre($search)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.titre like :search')
            ->setParameter('search', '%'.$search.'%')
            ->getQuery()
            // ->getOneOrNullResult()
        ;
    }
}
