<?php

namespace App\DataFixtures\ORM;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $post = new Post();
        $post->setPublishedAt(new \DateTime());
        $post->setSlug('hello-world');
        $post->setTitle('Hello world');
        $post->setContent(<<<EOL
# H1
## H2

Hello world post
EOL
);

        $manager->persist($post);
        $manager->flush();
    }
}