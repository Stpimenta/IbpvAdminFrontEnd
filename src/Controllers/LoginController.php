<?php
namespace App\Controllers;

class LoginController{
    public function index($request,$response){
        include __DIR__ . '/../templates/login.php';
        return $response;
    }

    public function login($request, $response) {
    $data = $request->getParsedBody();
    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';

    if ($email === 'admin@admin' && $password === '1234') {
      
        return $response
            ->withHeader('Location', '/dashboard')
            ->withStatus(302);
    } else {
        
        $error = "Usuário ou senha inválidos!";
        include __DIR__ . '/../templates/login.php';
        return $response;
    }
}

}