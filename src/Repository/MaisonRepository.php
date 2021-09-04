<?php

namespace App\Repository;

use App\Entity\Maison;
use App\Entity\ImmobilierSearchSelling;
use App\Entity\ImmobilierSearchRenting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Maison|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maison|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maison[]    findAll()
 * @method Maison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaisonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Maison::class);
    }

    // /**
    //  * @return Maison[] Returns an array of Maison objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Maison
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findRentingMaisons()
    {
        return $this->createQueryBuilder('m')
            ->Where('m.nbreMaisonALouer > :min')
            ->setParameter('min', 0)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findSellingMaisons()
    {
        return $this->createQueryBuilder('m')
            ->Where('m.nbreMaisonAVendre > 0')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findRentingMaisonsByCriteria($search)
    {
        $query =  $this->createQueryBuilder('m')
            ->Where('m.nbreMaisonALouer  > :min')
            ->setParameter('min', 0)
            ;
        $query = $this->addSearchCriteria($search, $query);
        return $query
            ->getQuery()
            ->getResult();
            
    }

    public function findSellingMaisonsByCriteria($search)
    {
        $query = $this->createQueryBuilder('m')
            ->Where('m.nbreMaisonAVendre > 0')
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
                ->andWhere('m.prix <= :maxprice')
                ->setParameter('maxprice', $search->$method());
        }

        $method = (method_exists($search, "getMinSurface")) ? "getMinSurface" : "getMinSurfaceRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('m.surface >= :minsurface')
                ->setParameter('minsurface', $search->$method());
        }

        $method = (method_exists($search, "getNbreDeChambres")) ? "getNbreDeChambres" : "getNbreDeChambresRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('m.chambres = :chambres')
                ->setParameter('chambres', $search->$method());
        }

        $method = (method_exists($search, "getNbreDeSallesDeBain")) ? "getNbreDeSallesDeBain" : "getNbreDeSallesDeBainRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('m.sallesDeBain >= :sallesDeBain')
                ->setParameter('sallesDeBain', $search->$method());
        }

        $method = (method_exists($search, "getNbreDeCuisines")) ? "getNbreDeCuisines" : "getNbreDeCuisinesRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('m.cuisines >= :cuisines')
                ->setParameter('cuisines', $search->$method());
        }

        $method = (method_exists($search, "getNbreDeSalons")) ? "getNbreDeSalons" : "getNbreDeSalonsRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('m.salons >= :salons')
                ->setParameter('salons', $search->$method());
        }

        $method = (method_exists($search, "getNbreDeEtages")) ? "getNbreDeEtages" : "getNbreDeEtagesRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('m.etages >= :etages')
                ->setParameter('etages', $search->$method());
        }

        $method = (method_exists($search, "getNbreDeGarages")) ? "getNbreDeGarages" : "getNbreDeGaragesRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('m.garages >= :garages')
                ->setParameter('garages', $search->$method());
        }

        $method = (method_exists($search, "getNbreDePiscines")) ? "getNbreDePiscines" : "getNbreDePiscinesRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('m.piscines >= :piscines')
                ->setParameter('piscines', $search->$method());
        }

        $method = (method_exists($search, "getNbreDeJardins")) ? "getNbreDeJardins" : "getNbreDeJardinsRenting" ;
        if ($search->$method()) {
            $query = $query
                ->andWhere('m.jardins >= :jardins')
                ->setParameter('jardins', $search->$method());
        }

        $method = (method_exists($search, "getFonctionnalites")) ? "getFonctionnalites" : "getFonctionnalitesRenting" ;
        $method2 = (method_exists($search, "getAddress")) ? "getAddress" : "getAddressRenting" ;
        if ($search->$method()->count() > 0 || $search->$method2()) {
            
            $query = $query
                ->leftJoin('m.cites','c')
                ->addSelect('c');
            if ($search->$method()->count() > 0) {
                $k = 0;
                foreach($search->$method() as $fonctionnalite) {
                    $k++;
                    $query = $query
                        ->andWhere(":fonctionnalite$k MEMBER OF c.fonctionnalites")
                        ->setParameter("fonctionnalite$k", $fonctionnalite);
                }
            }

            if ($search->$method2()) {
                $query = $query
                        ->andWhere("c.adresse like :adresse")
                        ->setParameter("adresse", '%'.$search->$method2().'%');
            }
        }

        return $query;
    }
}
