<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Subscription;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $subscription = new Subscription();
        $subscription ->setTitle('Free');
        $subscription->setDescription('abonnement gratuit');
        $subscription->setPrice('0');
        $subscription->setPdfLimit('1');
        $subscription->setMedia('https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.bgmp.fr%2Fwp-content%2Fuploads%2F2020%2F06%2Fsymfony.png&tbnid=OBbtYzzg4EAI1M&vet=12ahUKEwjgne7HsLmEAxVtUKQEHcHoBRIQMygBegQIARB1..i&imgrefurl=https%3A%2F%2Fwww.bgmp.fr%2Fsymfony%2F&docid=8KDsWMfoOlLgQM&w=1500&h=800&q=symfony&ved=2ahUKEwjgne7HsLmEAxVtUKQEHcHoBRIQMygBegQIARB1');

        $manager->persist($subscription);

        $subscription2 = new Subscription();
        $subscription2 ->setTitle('Premium');
        $subscription2->setDescription('abonnement premium');
        $subscription2->setPrice('10');
        $subscription2->setPdfLimit('5');
        $subscription2->setMedia('https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.bgmp.fr%2Fwp-content%2Fuploads%2F2020%2F06%2Fsymfony.png&tbnid=OBbtYzzg4EAI1M&vet=12ahUKEwjgne7HsLmEAxVtUKQEHcHoBRIQMygBegQIARB1..i&imgrefurl=https%3A%2F%2Fwww.bgmp.fr%2Fsymfony%2F&docid=8KDsWMfoOlLgQM&w=1500&h=800&q=symfony&ved=2ahUKEwjgne7HsLmEAxVtUKQEHcHoBRIQMygBegQIARB1');


        $manager->persist($subscription2);

        $subscription3 = new Subscription();
        $subscription3 ->setTitle('Premium ++');
        $subscription3->setDescription('abonnement entreprise');
        $subscription3->setPrice('100');
        $subscription3->setPdfLimit('15');
        $subscription3->setMedia('https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.bgmp.fr%2Fwp-content%2Fuploads%2F2020%2F06%2Fsymfony.png&tbnid=OBbtYzzg4EAI1M&vet=12ahUKEwjgne7HsLmEAxVtUKQEHcHoBRIQMygBegQIARB1..i&imgrefurl=https%3A%2F%2Fwww.bgmp.fr%2Fsymfony%2F&docid=8KDsWMfoOlLgQM&w=1500&h=800&q=symfony&ved=2ahUKEwjgne7HsLmEAxVtUKQEHcHoBRIQMygBegQIARB1');

        $manager->persist($subscription3);

        $manager->flush();
    }
}
