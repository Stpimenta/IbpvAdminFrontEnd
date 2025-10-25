<?php

namespace App\Models;

use DateTime;

class User
{
    public int $id;
    public string $nome;
    public string $email;
    public ?string $tokenContribuicao;
    public ?string $telefone_pais;
    public ?string $telefoneNumero;
    public ?string $bairroEndereco;
    public ?string $cidadeEndereco;
    public ?string $ruaEndereco;
    public ?string $cepEndereco;
    public ?string $numeroEndereco;
    public ?string $ufEndereco;
    public ?string $complementoEndereco;
    public ?DateTime $data_nascimento;
    public ?DateTime $dataBatismo;
    public ?string $pastorBatismo;
    public ?string $igrejaBatismo;
    public bool $filhos;
    public ?string $profissao;
    public ?string $estadoCivil;
    public ?bool $active;
    public Role $role;
    public string $genero; // agora string: "masculino" ou "feminino"
    public ?string $urlImage;

    public function __construct(
        int $id,
        string $nome,
        string $email,
        ?string $tokenContribuicao,
        ?string $telefone_pais,
        ?string $telefoneNumero,
        ?string $bairroEndereco,
        ?string $cidadeEndereco,
        ?string $ruaEndereco,
        ?string $cepEndereco,
        ?string $numeroEndereco,
        ?string $ufEndereco,
        ?string $complementoEndereco,
        ?DateTime $data_nascimento,
        ?DateTime $dataBatismo,
        ?string $pastorBatismo,
        ?string $igrejaBatismo,
        bool $filhos,
        ?string $profissao,
        ?string $estadoCivil,
        ?bool $active,
        int $roleValue,
        int $generoValue,
        ?string $urlImage
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->tokenContribuicao = $tokenContribuicao;
        $this->telefone_pais = $telefone_pais;
        $this->telefoneNumero = $telefoneNumero;
        $this->bairroEndereco = $bairroEndereco;
        $this->cidadeEndereco = $cidadeEndereco;
        $this->ruaEndereco = $ruaEndereco;
        $this->cepEndereco = $cepEndereco;
        $this->numeroEndereco = $numeroEndereco;
        $this->ufEndereco = $ufEndereco;
        $this->complementoEndereco = $complementoEndereco;
        $this->data_nascimento = $data_nascimento;
        $this->dataBatismo = $dataBatismo;
        $this->pastorBatismo = $pastorBatismo;
        $this->igrejaBatismo = $igrejaBatismo;
        $this->filhos = $filhos;
        $this->profissao = $profissao;
        $this->estadoCivil = $estadoCivil;
        $this->active = $active;
        $this->role = Role::from($roleValue);
        $this->genero = $generoValue === 1 ? 'masculino' : 'feminino';
        $this->urlImage = $urlImage;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? 0,
            $data['nome'] ?? '',
            $data['email'] ?? '',
            $data['tokenContribuicao'] ?? null,
            $data['telefone_pais'] ?? null,
            $data['telefoneNumero'] ?? null,
            $data['bairroEdereco'] ?? null,
            $data['cidadeEndereco'] ?? null,
            $data['ruaEdereco'] ?? null,
            $data['cepEndereco'] ?? null,
            $data['numeroEndereco'] ?? null,
            $data['ufEndereco'] ?? null,
            $data['complementoEndereco'] ?? null,
            !empty($data['data_nascimento']) ? new DateTime($data['data_nascimento']) : null,
            !empty($data['dataBatismo']) ? new DateTime($data['dataBatismo']) : null,
            $data['pastorBatismo'] ?? null,
            $data['igrejaBatismo'] ?? null,
            $data['filhos'] ?? false,
            $data['profissao'] ?? null,
            $data['estadoCivil'] ?? null,
            $data['active'] ?? null,
            $data['rule'] ?? 3,
            $data['genero'] ?? 0,
            $data['urlImage'] ?? null
        );
    }
}
