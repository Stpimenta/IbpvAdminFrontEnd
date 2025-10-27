<?php

namespace App\Controllers;

use App\Services\JWTService;
use App\Services\LogService;


use App\Models\User;
use App\Models\Role;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;


class LoginController
{
    private LogService $logger;

    public function __construct(LogService $logger)
    {
        $this->logger = $logger; 
    }

    
    // index login screen
    public function index($request, $response)
    {

        //verify session
        $token = $_SESSION['jwtToken'] ?? null;
        
        /** @var User $user */
        $user = $_SESSION['user'];

        if ($token && JWTService::isValid($token) && in_array($user->role, [Role::ROOT, Role::ADMIN, Role::TESOURARIA])) {
            return $response
                ->withHeader('Location', '/dashboard')
                ->withStatus(302);
        }


        include __DIR__ . '/../templates/login.php';
        return $response;
    }


    //post login, to save jwt and user
    public function login($request, $response)
    {
     

        $body = (string) $request->getBody();
        $data = json_decode($body, true);

        //get json payload
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        //make request for my api
        $client = new Client(['base_uri' => $_ENV['API_BASE_URL']]);


        try {

            $apiResponse = $client->post('Login', [
                'json' => [
                    'gmail' => $email,
                    'senha' => $password
                ]
            ]);

            //json decode and save jwt token on session
            $body = json_decode($apiResponse->getBody()->getContents(), true);

            //get jwt
            $jwt = $body["jwtToken"] ?? null;

            if (empty($jwt)) {

                $payload = ['success' => false, 'message' => 'Erro inesperado'];
                $response->getBody()->write(json_encode($payload));
                return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
            }

            //get claims
            $userId = JWTService::getClaim($jwt, "http://schemas.xmlsoap.org/ws/2005/05/identity/claims/sid") ?? null;

            //request user
            $userResponse = $client->get("Usuario/{$userId}", [
                'headers' => [
                    'Authorization' => "Bearer {$jwt}",
                    'accept' => 'application/json'
                ]
            ]);

            $userData = json_decode($userResponse->getBody()->getContents(), true);

            //save user and token on session
            $user = User::fromArray($userData);
            $_SESSION['user']  = $user;
            $_SESSION['jwtToken'] = $body['jwtToken'];

            //redirect to dashboard
            $payload = ['success' => true, 'redirect' => '/dashboard'];
            $response->getBody()->write(json_encode($payload));
            return $response->withHeader('Content-Type', 'application/json'); //default 200

        } catch (ClientException $e) {

            //filter error
            $status = $e->getResponse()->getStatusCode();

            if ($status === 401) {
                $payload = ['success' => false, 'message' => 'Email ou senha inválidos'];
                $response->getBody()->write(json_encode($payload));
                return $response->withHeader('Content-Type', 'application/json')->withStatus(401);
            }

            if ($status === 403) {
                $payload = ['success' => false, 'message' => 'Você não tem permissão para acessar este sistema'];
                $response->getBody()->write(json_encode($payload));
                return $response->withHeader('Content-Type', 'application/json')->withStatus(403);
            }

            //unexpected error
            $this->logger->error("Unexpected ClientException: " . $e->getMessage());
            $payload = ['success' => false, 'message' => 'Erro inesperado'];
            $response->getBody()->write(json_encode($payload));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        } catch (\Exception $e) {

            //server error
            $this->logger->error("Exception connecting to API: " . $e->getMessage());
            $payload = ['success' => false, 'message' => 'Erro ao conectar na API'];
            $response->getBody()->write(json_encode($payload));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
    }

    //logout
    public function logout(Request $request, Response $response): Response
    {

        
        $_SESSION = [];
        session_destroy();
        if (isset($_COOKIE['auth_token'])) {
            setcookie('auth_token', '', time() - 3600, '/');
        }

      
        $templates = new \League\Plates\Engine(__DIR__ . '/../templates');
        $response->getBody()->write(
            $templates->render('logout', ['title' => 'Logout'])
        );

        return $response;
    }
}
