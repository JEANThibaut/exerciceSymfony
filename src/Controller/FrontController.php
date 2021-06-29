<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    #[Route('/', name: 'index')]
    #[Route('/home', name: 'home')]
    public function index(): Response
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    #[Route('/article/{id}', name:'single')]
    public function article(int $id = 1): Response
    {   
        return $this->render('front/article.html.twig', [
            'id'=>$id,
            'controller_name' => 'FrontController',
        ]);
    }

    #[Route('/admin/article/add', name:'addArticle')]
    public function addArticle(): Response
    {
        return $this->render('front/addArticle.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

}
