<?php

namespace App\Repository;

use App\Entity\Cantine;
use App\Entity\ImmobilierSearchSelling;
use App\Entity\ImmobilierSearchRenting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Cantine|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cantine|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cantine[]    findAll()
 * @method Cantine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CantineRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cantine::class);
    }

    // /**
    //  * @return Cantine[] Returns an array of Cantine objects
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
    public function findOneBySomeField($value): ?Cantine
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findRentingCantines()
    {
        return $this->createQueryBuilder('c')
            ->Where('c.nbreCantineALouer  > :min')
            ->setParameter('min', 0)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findSellingCantines()
    {
        return $this->createQueryBuilder('c')
            ->Where('c.nbreCantineAvendre > 0')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findRentingCantinesByCriteria($search)
    {
        $query =  $this->createQueryBuilder('c')
            ->Where('c.nbreCantineALouer > :min')
            ->setParameter('min', 0)
            ;
        $query = $this->addSearchCriteria($search, $query);
        return $query
            ->getQuery()
            ->getResult();
            
    }

    public function findSellingCantinesByCriteria($search)
    {
        $query = $this->createQueryBuilder('c')
            ->Where('c.nbreCantineAvendre > 0')
        ;

        $query = $this->addSearchCriteria($search, $query);
        return $query
            ->getQuery()
            ->getResult();
    }

    private function addSearchCriteria($search, $query){

        $method = (method_exists($search, "getMaxPrice")) ? "getMaxPrice" : "getMaxPriceRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('c.prix <= :maxprice')
                ->setParameter('maxprice', $search->$method());
        }

        $method = (method_exists($search, "getMinSurface")) ? "getMinSurface" : "getMinSurfaceRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('c.surface >= :minsurface')
                ->setParameter('minsurface', $search->$method());
        }
        
        $method = (method_exists($search, "getFonctionnalites")) ? "getFonctionnalites" : "getFonctionnalitesRenting" ;
        $method2 = (method_exists($search, "getAddress")) ? "getAddress" : "getAddressRenting" ;
        if ($search->$method()->count() > 0 || $search->$method2()) {
            
            $query = $query
                ->leftJoin('c.centres','ce')
                ->addSelect('ce');
            if ($search->$method()->count() > 0) {
                $k = 0;
                foreach($search->$method() as $fonctionnalite) {
                    $k++;
                    $query = $query
                        ->andWhere(":fonctionnalite$k MEMBER OF ce.fonctionnalites")
                        ->setParameter("fonctionnalite$k", $fonctionnalite);
                }
            }

            if ($search->$method2()) {
                $query = $query
                        ->andWhere("ce.adresse like :adresse")
                        ->setParameter("adresse", '%'.$search->$method2().'%');
            }
        }

        return $query;
    }
}
