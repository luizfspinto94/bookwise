<?php

$id = $_REQUEST["id"];

$livro = $database->query(
    query: "select * from livros where id = :id",
    class: Livro::class,
    params: ["id" => $id]
)->fetch();

$avaliacoes = $database->query(
    query: "select * from avaliacoes where livro_id = :livro_id",
    class: Avaliacao::class,
    params: [
        "livro_id" => $id
    ]
)->fetchAll();


view("livro", [
    "livro" => $livro,
    "avaliacoes" => $avaliacoes
]);
