<?php 

$db = new Database();
$livros = $db->livros();

view("index", [
    "livros" => $livros
]);
?>