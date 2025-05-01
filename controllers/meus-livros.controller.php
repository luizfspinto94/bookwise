<?php

if(! auth()) {
    header("Location:/login");
}

$id = auth()->id;

$livros = $database->query(
    query: "select * from livros where usuario_id = :usuario_id",
    class: Livro::class,
    params: [
        "usuario_id" => $id
    ]
)->fetchAll();

view("meus-livros", [
    "livros" => $livros
]);
