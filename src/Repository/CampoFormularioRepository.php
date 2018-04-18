<?php

namespace App\Repository;

use App\Entity\CampoFormulario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CampoFormulario|null find($id, $lockMode = null, $lockVersion = null)
 * @method CampoFormulario|null findOneBy(array $criteria, array $orderBy = null)
 * @method CampoFormulario[]    findAll()
 * @method CampoFormulario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampoFormularioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CampoFormulario::class);
    }

//    /**
//     * @return CampoFormulario[] Returns an array of CampoFormulario objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CampoFormulario
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
