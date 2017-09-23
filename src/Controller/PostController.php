<?php

namespace App\Controller;

use App\Entity\Post;
use App\Manager\PostManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PostController
 *
 * @Route("/posts")
 */
class PostController extends Controller
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function indexAction(PostManager $postManager): Response
    {
        $posts = $postManager->getLatest();

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/{slug}")
     * @Method("GET")
     */
    public function showAction(Post $post): Response
    {
        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }
}