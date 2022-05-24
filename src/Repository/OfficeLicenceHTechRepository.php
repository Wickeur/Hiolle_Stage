<?php

namespace App\Repository;

use App\Entity\OfficeLicenceHTech;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OfficeLicenceHTech>
 *
 * @method OfficeLicenceHTech|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfficeLicenceHTech|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfficeLicenceHTech[]    findAll()
 * @method OfficeLicenceHTech[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfficeLicenceHTechRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfficeLicenceHTech::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(OfficeLicenceHTech $entity, bool $flush = true): void
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
    public function remove(OfficeLicenceHTech $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return OfficeLicenceHTech[] Returns an array of OfficeLicenceHTech objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OfficeLicenceHTech
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
