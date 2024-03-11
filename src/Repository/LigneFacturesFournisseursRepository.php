<?php

namespace App\Repository;

use App\Entity\LigneFacturesFournisseurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneFacturesFournisseurs>
 *
 * @method LigneFacturesFournisseurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneFacturesFournisseurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneFacturesFournisseurs[]    findAll()
 * @method LigneFacturesFournisseurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneFacturesFournisseursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneFacturesFournisseurs::class);
    }

    //    /**
    //     * @return LigneFacturesFournisseurs[] Returns an array of LigneFacturesFournisseurs objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?LigneFacturesFournisseurs
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
