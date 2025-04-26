<?php 

$pesquisar = $_REQUEST["pesquisar"] ?? "";

$db = new Database();
$livros = $db->livros($pesquisar);

view("index", [
    "livros" => $livros
]);
?>