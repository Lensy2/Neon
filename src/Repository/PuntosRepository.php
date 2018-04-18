<?php

namespace App\Repository;

use App\Entity\Puntos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Puntos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Puntos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Puntos[]    findAll()
 * @method Puntos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PuntosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Puntos::class);
    }

//    /**
//     * @return Puntos[] Returns an array of Puntos objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Puntos
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
