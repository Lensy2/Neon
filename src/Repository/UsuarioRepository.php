<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Usuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuario[]    findAll()
 * @method Usuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioRepository extends EntityRepository
{
//    public function __construct(RegistryInterface $registry)
//    {
//        parent::__construct($registry, Sede::class);
//    }

    public function listaDQL($usuario){
        $em = $this->getEntityManager();
        $arUsuario= $em->createQueryBuilder()
            ->from("App:Usuario", "us")
            ->select("us");
        if(!empty($usuario)) {
            $arUsuario->where("us.nombre LIKE '%{$usuario}%'");
        }
        return $arUsuario->getQuery();

    }

//    /**
//     * @return Usuario[] Returns an array of Usuario objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Usuario
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
