<?php

namespace App\Controller;

use App\Entity\Subscription;
use App\Form\Type\SubscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscriptionController extends AbstractController
{
    #[Route('/subscription', name: 'app_subscription')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(SubscriptionType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $abonnementSelect = $request->request->all('subscription');
            $abonnement = $em->getRepository(Subscription::class)->find($abonnementSelect['title']);

            $user = $this->getUser();
            $user->setSubscription($abonnement);
            //persist
            //flush
            $em->persist($user);
            $em->flush();
        }

        return $this->render('subscription/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
