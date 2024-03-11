<?php

namespace App\Repository;

use App\Entity\ErpMatierePremiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpMatierePremiere>
 *
 * @method ErpMatierePremiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpMatierePremiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpMatierePremiere[]    findAll()
 * @method ErpMatierePremiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpMatierePremiereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpMatierePremiere::class);
    }

    //    /**
    //     * @return ErpMatierePremiere[] Returns an array of ErpMatierePremiere objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ErpMatierePremiere
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
