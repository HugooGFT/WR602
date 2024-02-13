<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class Gotenberg
{
    public function __construct(private HttpClientInterface $client,)
    {
    }

    public function fetchGitHubInformation(string $url): string
    {

        $response = $this->client->request('POST', 'http://localhost:3000/forms/chromium/convert/url', [
                'headers' => [
                    'Content-Type' => 'multipart/form-data'
                ],
                'body' => ['url' => $url]]);
        return $response->getContent();
    }
}
