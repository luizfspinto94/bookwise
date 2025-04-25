<?php
require("dados.php");

$id = $_REQUEST["id"];

$livroFiltrado = array_filter($livros, function ($l) use ($id) {
    return $l["id"] == $id;
});

$livro = array_pop($livroFiltrado);
view("livro");