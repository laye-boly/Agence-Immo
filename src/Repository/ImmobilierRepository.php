<?php

namespace App\Repository;

use App\Entity\Immobilier;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Immobilier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Immobilier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Immobilier[]    findAll()
 * @method Immobilier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImmobilierRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Immobilier::class);
    }

    // /**
    //  * @return Immobilier[] Returns an array of Immobilier objects
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
    public function findOneBySomeField($value): ?Immobilier
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findIdTitreDescription($from, $number)
    {
        $qb = $qb = $this->findImmobilier();
        $qb->setFirstResult($from)
            ->setMaxResults($number)
            // ->getQuery()
            // ->getResult()

        ;
        return new Paginator($qb);
    }

    public function getTotalImmobiliers()
    {
        return $this->createQueryBuilder('i')
        ->select('count(i.id)')
        ->getQuery()
        ->getSingleScalarResult();
        ;
    }

    public function findProjetTypeProjets($etat)
    {
        $qb = $this->findImmobilier();
        $qb->where('i.etat = :etat')
            ->setParameter('etat', $etat);
            // ->getQuery()
            // ->getResult()
        return new Paginator($qb);
        
        
    }

    private function findImmobilier(){
        return $this->createQueryBuilder('i')
            ->select('partial i.{id, titre, description, etat}')
            ->leftJoin('i.images','img')
            ->addSelect('img');
    }
}
