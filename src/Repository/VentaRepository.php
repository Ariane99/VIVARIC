<?php

namespace App\Repository;

use App\Entity\Venta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @method Venta|null find($id, $lockMode = null, $lockVersion = null)
 * @method Venta|null findOneBy(array $criteria, array $orderBy = null)
 * @method Venta[]    findAll()
 * @method Venta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VentaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Venta::class);
    }

    public function lista()
    {
        return $this->getEntityManager()
        ->createQuery('
            SELECT v
            From App:Venta v
        ')->getResult();
    }

    public function listamen()
    {
        return $this->getEntityManager()
        ->createQuery('
            SELECT v
            From App:Venta v
            WHERE Month(v.fecha_hora) = Month(:today)
        ')->setParameter('today', new \DateTime())->getResult();
    }

    public function listasem()
    {
        return $this->getEntityManager()
        ->createQuery('
            SELECT v
            From App:Venta v
            WHERE v.fecha_hora between :td and :today
        ')->setParameter('today', new \DateTime())->setParameter('td', new \DateTime('-15 days'))->getResult();
    }

    public function listafecha(string $fi, string $ff)
    {
        return $this->getEntityManager()
        ->createQuery('
            SELECT v
            From App:Venta v
            WHERE v.fecha_hora between :fi and :ff
        ')->setParameter('fi', $fi)->setParameter('ff', $ff)->getResult();
    }

    public function clientemas()
    {
        return $this->getEntityManager()
        ->createQuery('
            SELECT COUNT(v.cicliente) as repetidos, v.nombrecliente
            From App:Venta v
            GROUP BY v.nombrecliente ORDER BY repetidos DESC
        ')->getResult();
    }

    // /**
    //  * @return Venta[] Returns an array of Venta objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Venta
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
