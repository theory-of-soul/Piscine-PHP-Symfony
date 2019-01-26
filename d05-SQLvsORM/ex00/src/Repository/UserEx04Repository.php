<?php

namespace App\Repository;

use App\Entity\UserEx04;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserEx04|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserEx04|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserEx04[]    findAll()
 * @method UserEx04[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserEx04Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserEx04::class);
    }

    // /**
    //  * @return UserEx04[] Returns an array of UserEx04 objects
    //  */
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
    public function findOneBySomeField($value): ?UserEx04
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
