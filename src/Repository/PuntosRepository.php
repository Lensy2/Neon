<?php

namespace App\Repository;

use App\Entity\Punto;
use Doctrine\ORM\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Punto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Punto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Punto[]    findAll()
 * @method Punto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PuntosRepository extends EntityRepository
{

    public function listaDQL($nombre){
        $em = $this->getEntityManager();
        $arPuntos = $em->createQueryBuilder()
            ->from("App:Punto", "pu")
            ->select("pu");
        if(!empty($nombre)) {
            $arPuntos->where("pu.nombre LIKE '%{$nombre}%'");
        }
        return $arPuntos->getQuery();

    }
   //
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
