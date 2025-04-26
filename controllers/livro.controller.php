<?php

$id = $_REQUEST["id"];
$db = new Database();
$livro = $db->livro($id);

view("livro", [
    "livro" => $livro
]);