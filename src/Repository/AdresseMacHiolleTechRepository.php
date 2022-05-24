<?php

namespace App\Repository;

use App\Entity\AdresseMacHiolleTech;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdresseMacHiolleTech>
 *
 * @method AdresseMacHiolleTech|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdresseMacHiolleTech|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdresseMacHiolleTech[]    findAll()
 * @method AdresseMacHiolleTech[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdresseMacHiolleTechRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdresseMacHiolleTech::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AdresseMacHiolleTech $entity, bool $flush = true): void
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
    public function remove(AdresseMacHiolleTech $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AdresseMacHiolleTech[] Returns an array of AdresseMacHiolleTech objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdresseMacHiolleTech
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
