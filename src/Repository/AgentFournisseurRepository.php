<?php

namespace App\Repository;

use App\Entity\AgentFournisseur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AgentFournisseur>
 *
 * @method AgentFournisseur|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgentFournisseur|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgentFournisseur[]    findAll()
 * @method AgentFournisseur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgentFournisseurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgentFournisseur::class);
    }

    //    /**
    //     * @return AgentFournisseur[] Returns an array of AgentFournisseur objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AgentFournisseur
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
