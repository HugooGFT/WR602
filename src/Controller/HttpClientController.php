<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Service\HttpClient;



class HttpClientController extends AbstractController
{
    #[Route('/http/client', name: 'app_http_client')]
    public function new(HttpClient $httpClient): Response
    {
        $content = $httpClient->fetchGitHubInformation();

        return $this->render('http_client/index.html.twig', [
            'controller_name' => 'HttpClientController',
            'content' => $content,

        ]);
    }
}
