<?php

namespace App\Controller;

use App\Repository\PdfRepository;
use App\Repository\UserRepository;
use App\Service\Gotenberg;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoriqueController extends AbstractController
{
    #[Route('/historique', name: 'app_historique')]
    public function index(PdfRepository $pdfRepository, UserRepository $userRepository, Gotenberg $gotenberg): Response
    {

        $pdfs = $pdfRepository->findAll();
        $userRepository = $this->getUser()->getUserIdentifier();
        foreach ($pdfs as $pdf) {
            if ($userRepository === $pdfRepository = $this->getUser()->getUserIdentifier()) {
                $userpdf[] = $pdf->getUrl();
            }
        }

        return $this->render('historique/index.html.twig', [
            'controller_name' => 'HistoriqueController',
            'pdf' => $userpdf,


        ]);
    }

    #[Route('/historique/show/{id}', name: 'app_historique_show')]
    public function show(Gotenberg $gotenberg, PdfRepository $pdfRepository, UserRepository $userRepository, $id):Response
    {
        $pdfs = $pdfRepository->findAll();
        $userRepository = $this->getUser()->getUserIdentifier();
        foreach ($pdfs as $pdf) {
            if ($userRepository === $pdfRepository = $this->getUser()->getUserIdentifier()) {
                $userpdf[] = $pdf->getUrl();
            }
        }
        $convertion = $gotenberg->fetchGitHubInformation($userpdf[$id]);
        return new Response($convertion, 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
