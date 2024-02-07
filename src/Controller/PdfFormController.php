<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Gotenberg;



class PdfFormController extends AbstractController
{
    #[Route('/pdf/form', name: 'app_pdf_form')]
    public function new(Gotenberg $gotenberg): Response
    {

        //génération de l'index.html
        $url = [
            'url' => 'https://docs.mmi-troyes.fr/'
        ];

        //utilisation du service Gotenberg, en lui transmettant l'url afin de récupérer l'index.html
        $convertion = $gotenberg->fetchGitHubInformation($url);


        return new Response($convertion, 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
