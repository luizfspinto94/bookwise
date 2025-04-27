<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $validacao = Validacao::validar([
        "nome" => ["required"],
        "email" => ["required", "email"],
        "senha" => ["required", "senha"]
    ], $_POST);

    if($validacao->naoPassou()) {
        view("register");
        exit();
    }
    
    $database->query(
        query: "INSERT INTO usuarios(nome, email, senha) VALUES(:nome, :email, :senha)",
        params: [
            "nome" => $_POST["nome"],
            "email" => $_POST["email"],
            "senha" => $_POST["senha"]
        ]
    );

    header("Location:/login?mensagem=Usuario cadastrado com sucesso");
}

view("register");
