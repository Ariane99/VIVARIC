<?php

namespace App\Repository;

use App\Entity\Articulo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Articulo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Articulo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Articulo[]    findAll()
 * @method Articulo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticuloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Articulo::class);
    }

    public function lista()
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT  a
                From App:Articulo a
            ')->getResult();
    }

    //////////////////
    public function getArticulo(string $articulo)
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT a.stock
                From App:Articulo a 
                WHERE a.nombreArt = :articulo
            ')->setParameter('articulo', $articulo)->getResult();
    }
    ////////////////////

    public function masventa()
    {
        return $this->getEntityManager()
        ->createQuery('
            Select a
            from App:Articulo a
            JOIN a.detalleventa d WITH a.id = d.articulo
            ORDER BY a.stock ASC
        ')->getResult();
    }


    // /**
    //  * @return Articulo[] Returns an array of Articulo objects
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
    public function findOneBySomeField($value): ?Articulo
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
