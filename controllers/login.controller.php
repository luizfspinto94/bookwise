<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $validacao = Validacao::validar([
        "email" => ["required", "email"],
        "senha" => ["required"]
    ], $_POST);

    if($validacao->naoPassou("login")) {
        view("login");
        exit();
    }

    $usuario = $database->query(
        query: "select * from usuarios where email = :email and senha = :senha",
        class: Usuario::class,
        params: [
            "email" => $email,
            "senha" => $senha
        ]
    )->fetch();

    if($usuario) {
        $_SESSION["auth"] = $usuario;
        header("Location:/");
    }
}

view("login");
