<?php

namespace App\Repository;

use App\Entity\ErpCategoriePremiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpCategoriePremiere>
 *
 * @method ErpCategoriePremiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpCategoriePremiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpCategoriePremiere[]    findAll()
 * @method ErpCategoriePremiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpCategoriePremiereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpCategoriePremiere::class);
    }

    //    /**
    //     * @return ErpCategoriePremiere[] Returns an array of ErpCategoriePremiere objects
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

    //    public function findOneBySomeField($value): ?ErpCategoriePremiere
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
