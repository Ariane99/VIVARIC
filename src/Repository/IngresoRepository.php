<?php

namespace App\Repository;

use App\Entity\Ingreso;
use App\Entity\DetalleIngreso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ingreso|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ingreso|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ingreso[]    findAll()
 * @method Ingreso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngresoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ingreso::class);
    }

    public function lista()
    {
        return $this->getEntityManager()
        ->createQuery('
            SELECT i
            From App:Ingreso i
        ')->getResult();
    }

    public function listafecha(string $fi, string $ff)
    {
        return $this->getEntityManager()
        ->createQuery('
            SELECT i
            From App:Ingreso i
            WHERE i.fecha_hora between :fi and :ff
        ')->setParameter('fi', $fi)->setParameter('ff', $ff)->getResult();
    }

    // /**
    //  * @return Ingreso[] Returns an array of Ingreso objects
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
    public function findOneBySomeField($value): ?Ingreso
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
