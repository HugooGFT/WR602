<?php

namespace App\Controller;

use App\Repository\PdfRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoriqueController extends AbstractController
{
    #[Route('/historique', name: 'app_historique')]
    public function index(PdfRepository $pdfRepository, UserRepository $userRepository): Response
    {

        $pdfs = $pdfRepository->findAll();

        $userRepository = $this->getUser()->getUserIdentifier();
        $userpdf = [];
        foreach ($pdfs as $pdf) {
            if ($userRepository === $pdfRepository = $this->getUser()->getUserIdentifier()) {
                $userpdf[] = $pdf->getUrl();
            }
        }
        return $this->render('historique/index.html.twig', [
            'controller_name' => 'HistoriqueController',
        ]);
    }
}
