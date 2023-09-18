<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PostRepository $post): Response
    {
        return $this->render('page/home.html.twig', [
            'posts' => $post->findLatest(),
        ]);
    }

    #[Route('/blog/{slug}', name: 'app_post')]
    public function post(Post $post): Response
    {
        return $this->render('page/post.html.twig', ['post' => $post]);
    }
}
