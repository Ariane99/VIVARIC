<?php

namespace App\Repository;

use App\Entity\DetalleVenta;
use App\Entity\Articulo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DetalleVenta|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetalleVenta|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetalleVenta[]    findAll()
 * @method DetalleVenta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetalleVentaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetalleVenta::class);
    }

    // /**
    //  * @return DetalleVenta[] Returns an array of DetalleVenta objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DetalleVenta
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
