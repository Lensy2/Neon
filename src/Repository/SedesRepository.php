<?php

namespace App\Repository;

use App\Entity\Sede;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sede|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sede|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sede[]    findAll()
 * @method Sede[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SedesRepository extends EntityRepository
{
//    public function __construct(RegistryInterface $registry)
//    {
//        parent::__construct($registry, Sede::class);
//    }

    public function listaDQL($sedes){
        $em = $this->getEntityManager();
        $arSedes = $em->createQueryBuilder()
            ->from("App:Sede", "se")
            ->select("se");
        if(!empty($sedes)) {
            $arSedes->where("se.nombre LIKE '%{$sedes}%'");
        }
        return $arSedes->getQuery();

    }

//    /**
//     * @return Sedes[] Returns an array of Sedes objects
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
    public function findOneBySomeField($value): ?Sedes
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
