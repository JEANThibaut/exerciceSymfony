<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for($i=0;$i<10;$i++){
        $article = new Article();
        $article->setTitle('Exemple de titre ');
        $article->setContent('Du contenu pour remplir la table content dans la base de données forumApp');
        $article->setPublished(new \Datetime());
        $article->setAuthor("Moi-même");
        $article->setCategory('Histoire');
        $article->setView(1);
        $manager->persist($article);
        }
        $manager->flush();
    }      
}

