<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $validacao = Validacao::validar([
        "email" => ["required", "email"],
        "senha" => ["required"]
    ], $_POST);

    if ($validacao->naoPassou("login")) {
        view("login");
        exit();
    }

    $usuario = $database->query(
        query: "select * from usuarios where email = :email",
        class: Usuario::class,
        params: [
            "email" => $email
        ]
    )->fetch();

    if ($usuario) {
        if (! password_verify($senha, $usuario->senha)) {
            flash()->push("validacoes_login", ["usuario ou senha incorretos"]);
            header("Location: /login");
            exit();
        }
    }

    $_SESSION["auth"] = $usuario;
    header("Location:/");
}

view("login");
