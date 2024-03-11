<?php

namespace App\Repository;

use App\Entity\ErpTypeMatierePremiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpTypeMatierePremiere>
 *
 * @method ErpTypeMatierePremiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpTypeMatierePremiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpTypeMatierePremiere[]    findAll()
 * @method ErpTypeMatierePremiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpTypeMatierePremiereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpTypeMatierePremiere::class);
    }

    //    /**
    //     * @return ErpTypeMatierePremiere[] Returns an array of ErpTypeMatierePremiere objects
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

    //    public function findOneBySomeField($value): ?ErpTypeMatierePremiere
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
