<?php

namespace App\Repository;

use App\Entity\Appartement;
use App\Entity\ImmobilierSearchSelling;
use App\Entity\ImmobilierSearchRenting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Appartement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appartement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appartement[]    findAll()
 * @method Appartement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppartementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Appartement::class);
    }

    // /**
    //  * @return Appartement[] Returns an array of Appartement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Appartement
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findRentingAppartements()
    {
        return $this->createQueryBuilder('a')
            ->Where('a.nbreAppartALouer  > :min')
            ->setParameter('min', 0)
            ->getQuery()
            ->getResult();
            
    }

    public function findSellingAppartements()
    {
        return $this->createQueryBuilder('a')
            ->Where('a.nbreAppartAVendre > 0')
            ->getQuery()
            ->getResult();
    }

    public function findRentingAppartementsByCriteria($search)
    {
        $query =  $this->createQueryBuilder('a')
            ->Where('a.nbreAppartALouer  > :min')
            ->setParameter('min', 0)
            ;
        $query = $this->addSearchCriteria($search, $query);
        return $query
            ->getQuery()
            ->getResult();
            
    }

    public function findSellingAppartementsByCriteria($search)
    {
        $query = $this->createQueryBuilder('a')
            ->Where('a.nbreAppartAVendre > 0')
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
                ->andWhere('a.prix <= :maxprice')
                ->setParameter('maxprice', $search->$method());
        }

        $method = (method_exists($search, "getMinSurface")) ? "getMinSurface" : "getMinSurfaceRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('a.surface >= :minsurface')
                ->setParameter('minsurface', $search->$method());
        }

        $method = (method_exists($search, "getNbreDeChambres")) ? "getNbreDeChambres" : "getNbreDeChambresRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('a.chambres = :chambres')
                ->setParameter('chambres', $search->$method());
        }

        $method = (method_exists($search, "getNbreDeSallesDeBain")) ? "getNbreDeSallesDeBain" : "getNbreDeSallesDeBainRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('a.sallesDeBain >= :sallesDeBain')
                ->setParameter('sallesDeBain', $search->$method());
        }

        $method = (method_exists($search, "getNbreDeCuisines")) ? "getNbreDeCuisines" : "getNbreDeCuisinesRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('a.cuisines >= :cuisines')
                ->setParameter('cuisines', $search->$method());
        }

        $method = (method_exists($search, "getNbreDeSalons")) ? "getNbreDeSalons" : "getNbreDeSalonsRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('a.salons >= :salons')
                ->setParameter('salons', $search->$method());
        }

       
        $method = (method_exists($search, "getFonctionnalites")) ? "getFonctionnalites" : "getFonctionnalitesRenting" ;
        $method2 = (method_exists($search, "getAddress")) ? "getAddress" : "getAddressRenting" ;
        if ($search->$method()->count() > 0 || $search->$method2()) {
            
            $query = $query
                ->leftJoin('a.immeubles','i')
                ->addSelect('i');
            if ($search->$method()->count() > 0) {
                $k = 0;
                foreach($search->$method() as $fonctionnalite) {
                    $k++;
                    $query = $query
                        ->andWhere(":fonctionnalite$k MEMBER OF i.fonctionnalites")
                        ->setParameter("fonctionnalite$k", $fonctionnalite);
                }
            }

            if ($search->$method2()) {
                $query = $query
                        ->andWhere("i.adresse like :adresse")
                        ->setParameter("adresse", '%'.$search->$method2().'%');
            }
        }

        return $query;
    }
}
