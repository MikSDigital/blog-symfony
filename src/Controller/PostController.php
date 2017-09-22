<?php

namespace App\Controller;

use App\Manager\PostManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PostController
 *
 * @Route("/post")
 */
class PostController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(PostManager $postManager)
    {
        $posts = $postManager->getLatest();
    }
}