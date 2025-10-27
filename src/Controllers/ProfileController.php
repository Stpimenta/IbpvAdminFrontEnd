<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use League\Plates\Engine;

class ProfileController
{
    private Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../templates');
    }

    public function profile(Request $request, Response $response): Response
    {
        $user = $_SESSION['user'];

        $data = [
            'title' => 'GestPV',
            'name' => $user->nome,
            'email' => $user->email,
            'gender' => $user->genero,
            'dob' => $user->data_nascimento ? $user->data_nascimento->format('d/m/Y') : '',
            'profession' => $user->profissao,
            'phone' => $user->telefoneNumero ? "({$user->telefone_pais}) {$user->telefoneNumero}" : '',
            'token' => $user->tokenContribuicao,
            'role' => $user->role->name ?? 'User',
            'urlImage' => $user->urlImage,
        ];


        $response->getBody()->write(
            $this->templates->render('profile', $data)
        );
        
        return $response;
    }
}
