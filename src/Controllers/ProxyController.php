<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ProxyController
{

    private string $backendBaseUrl;
    public function __construct()
    {
        $this->backendBaseUrl = rtrim($_ENV['API_BASE_URL'], '/');
    }

    public function handle(Request $request, Response $response, array $args): Response
    {
        /* get request params */
        $jwt = $_SESSION['jwtToken'] ?? null;
        $path = $args['path'] ?? '';
        $method = strtoupper($request->getMethod());
        $query = $request->getUri()->getQuery();
        $url = "{$this->backendBaseUrl}/{$path}" . ($query ? "?$query" : "");

        /* init client */
        $client = new Client(['timeout' => 10]);

        try {
            $apiResponse = $client->request($method, $url, [
                'headers' => [
                    'Authorization' => "Bearer {$jwt}",
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'body' => (string) $request->getBody(),
            ]);

            $body = $apiResponse->getBody()->getContents();
            $status = $apiResponse->getStatusCode();

            $response->getBody()->write($body);
            return $response
                ->withStatus($status)
                ->withHeader('Content-Type', 'application/json');
        } catch (ClientException $e) {
            $status = $e->getResponse()->getStatusCode();
            $body = json_decode($e->getResponse()->getBody()->getContents(), true);

            if ($status === 401) {
                return $response
                    ->withHeader('Location', '/access-denied')
                    ->withStatus(302);
            }

            $response->getBody()->write(json_encode([
                'success' => false,
                'message' => $body['message'] ?? 'Erro remoto desconhecido.',
                'status' => $status,
            ]));
            return $response
                ->withStatus($status)
                ->withHeader('Content-Type', 'application/json');
        } catch (\Throwable $e) {
            $response->getBody()->write(json_encode([
                'success' => false,
                'message' => 'Falha ao conectar com o servidor interno.',
            ]));
            return $response->withStatus(500)->withHeader('Content-Type', 'application/json');
        }
    }
}
