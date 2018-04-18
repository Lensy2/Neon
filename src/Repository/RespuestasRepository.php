<?php

namespace App\Repository;

use App\Entity\Respuestas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Respuestas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Respuestas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Respuestas[]    findAll()
 * @method Respuestas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RespuestasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Respuestas::class);
    }

//    /**
//     * @return Respuestas[] Returns an array of Respuestas objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Respuestas
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
