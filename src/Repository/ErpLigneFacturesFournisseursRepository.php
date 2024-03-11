<?php

namespace App\Repository;

use App\Entity\ErpLigneFacturesFournisseurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpLigneFacturesFournisseurs>
 *
 * @method ErpLigneFacturesFournisseurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpLigneFacturesFournisseurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpLigneFacturesFournisseurs[]    findAll()
 * @method ErpLigneFacturesFournisseurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpLigneFacturesFournisseursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpLigneFacturesFournisseurs::class);
    }

//    /**
//     * @return ErpLigneFacturesFournisseurs[] Returns an array of ErpLigneFacturesFournisseurs objects
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

//    public function findOneBySomeField($value): ?ErpLigneFacturesFournisseurs
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
