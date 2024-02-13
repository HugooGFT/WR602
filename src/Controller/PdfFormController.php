<?php

namespace App\Controller;

use App\Entity\Pdf;
use App\Entity\Url;
use App\Form\Type\UrlFormType;
use App\Service\Gotenberg;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PdfFormController extends AbstractController
{
    #[Route('/pdf/form', name: 'app_pdf_form')]
    public function new(Gotenberg $gotenberg, Request $request, EntityManagerInterface $entityManager): Response
    {


        $pdf = new Pdf();
        $pdf->setUrl('Url');

        $form = $this->createForm(UrlFormType::class, $pdf);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pdf = $form->getData();
            //utilisation du service Gotenberg, en lui transmettant l'url afin de récupérer l'index.html
            $convertion = $gotenberg->fetchGitHubInformation($pdf->getUrl());

            $entityManager->persist($pdf);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();

            return new Response($convertion, 200, [
                'Content-Type' => 'application/pdf',
            ]);
        }
        return $this->render('pdf_form/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
