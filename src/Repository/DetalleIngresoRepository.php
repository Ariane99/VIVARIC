<?php

namespace App\Repository;

use App\Entity\Ingreso;
use App\Entity\DetalleIngreso;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method DetalleIngreso|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetalleIngreso|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetalleIngreso[]    findAll()
 * @method DetalleIngreso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetalleIngresoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetalleIngreso::class);
    }

    // /**
    //  * @return DetalleIngreso[] Returns an array of DetalleIngreso objects
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
    public function findOneBySomeField($value): ?DetalleIngreso
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
