<?php

namespace App\Manager;

use App\Entity\Post;
use Doctrine\ORM\EntityManager;

/**
 * Class PostManager.
 */
class PostManager
{
    const LIMIT_POSTS = 10;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * PostManager constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param int $limit
     *
     * @return Post[]
     */
    public function getLatest($limit = self::LIMIT_POSTS)
    {
        return $this->entityManager
            ->getRepository(Post::class)
            ->createQueryBuilder('p')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }
}