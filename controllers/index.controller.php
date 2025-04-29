<?php

//se não tiver autenticado, vai para login.
if(! auth()) {
    header("Location: /login");
}

$pesquisar = $_REQUEST["pesquisar"] ?? "";

$livros = $database->query(
    query: "select * from livros where titulo like :pesquisar or autor like :pesquisar",
    class: Livro::class,
    params: ["pesquisar" => "%$pesquisar%"]
)->fetchAll();

view("index", [
    "livros" => $livros
]);
