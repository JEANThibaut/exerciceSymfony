<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;

class FrontController extends AbstractController
{
    #[Route('/', name: 'index')]
    #[Route('/home', name: 'home')]
    public function index(): Response
    {   
        $articleRepository=$this->getDoctrine()->getRepository(Article::class);
        $articles=$articleRepository->findBy(
            [],
            null,
            3,
            0
        );
        
        return $this->render('front/index.html.twig', [
            'articles' => $articles,
        ]);
    }

        #[ROUTE ('article/{id}', name:'single')]
    public function single(int $id=1, ArticleRepository $articleRepository): Response
    {
        // Contrairement à l'index ici le repo de l'entité à été passé directement en paramètre
        // On fait appelle à la méthode find du repo qui recherche une entité par sa clef primaire
        $article = $articleRepository->find($id);

        return $this->render('front/single.html.twig', [
            "article" => $article,
        ]);

    }
    // #[Route('/article/{id}', name:'single')]
    // public function single(int $id = 1): Response
    // {   
    //     return $this->render('front/article.html.twig', [
    //         'id'=>$id,
    //         'controller_name' => 'FrontController',
    //     ]);
    // }

    #[Route('/admin/article/add', name:'addArticle')]
    public function addArticle(): Response
    {
        return $this->render('front/addArticle.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

}
