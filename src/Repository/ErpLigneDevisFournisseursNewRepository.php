<?php

namespace App\Repository;

use App\Entity\ErpLigneDevisFournisseursNew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpLigneDevisFournisseursNew>
 *
 * @method ErpLigneDevisFournisseursNew|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpLigneDevisFournisseursNew|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpLigneDevisFournisseursNew[]    findAll()
 * @method ErpLigneDevisFournisseursNew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpLigneDevisFournisseursNewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpLigneDevisFournisseursNew::class);
    }

    //    /**
    //     * @return ErpLigneDevisFournisseursNew[] Returns an array of ErpLigneDevisFournisseursNew objects
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

    //    public function findOneBySomeField($value): ?ErpLigneDevisFournisseursNew
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
