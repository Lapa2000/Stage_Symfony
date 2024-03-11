<?php

namespace App\Repository;

use App\Entity\Masociete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Masociete>
 *
 * @method Masociete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Masociete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Masociete[]    findAll()
 * @method Masociete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MasocieteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Masociete::class);
    }

//    /**
//     * @return Masociete[] Returns an array of Masociete objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Masociete
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
