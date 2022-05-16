<?php

namespace App\Repository;

use App\Entity\LesOrdiHiolleIndustries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LesOrdiHiolleIndustries>
 *
 * @method LesOrdiHiolleIndustries|null find($id, $lockMode = null, $lockVersion = null)
 * @method LesOrdiHiolleIndustries|null findOneBy(array $criteria, array $orderBy = null)
 * @method LesOrdiHiolleIndustries[]    findAll()
 * @method LesOrdiHiolleIndustries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LesOrdiHiolleIndustriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LesOrdiHiolleIndustries::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(LesOrdiHiolleIndustries $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(LesOrdiHiolleIndustries $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return LesOrdiHiolleIndustries[] Returns an array of LesOrdiHiolleIndustries objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LesOrdiHiolleIndustries
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
