<?php

namespace App\Repository;

use App\Entity\SegmentoFormulario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SegmentoFormulario|null find($id, $lockMode = null, $lockVersion = null)
 * @method SegmentoFormulario|null findOneBy(array $criteria, array $orderBy = null)
 * @method SegmentoFormulario[]    findAll()
 * @method SegmentoFormulario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SegmentoFormularioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SegmentoFormulario::class);
    }

//    /**
//     * @return SegmentoFormulario[] Returns an array of SegmentoFormulario objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SegmentoFormulario
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
