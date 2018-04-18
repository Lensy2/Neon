<?php

namespace App\Repository;

use App\Entity\OpcionCampo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OpcionCampo|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpcionCampo|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpcionCampo[]    findAll()
 * @method OpcionCampo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpcionCampoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OpcionCampo::class);
    }

//    /**
//     * @return OpcionCampo[] Returns an array of OpcionCampo objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OpcionCampo
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
