<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $descricao = $_POST["descricao"];
    $usuario_id = auth()->id;
    
    $validacao = Validacao::validar([
        "titulo" => ["required"],
        "autor" => ["required"],
        "descricao" => ["required"]
    ], $_POST);

    if($validacao->naoPassou("livro")) {
        header("Location: /meus-livros");
        exit();
    }

    $database->query(
        query: "INSERT INTO livros(titulo, autor, descricao, usuario_id) VALUES(:titulo, :autor, :descricao, :usuario_id)",
        class: Livro::class,
        params: [
            "titulo" => $titulo,
            "autor" => $autor,
            "descricao" => $descricao,
            "usuario_id" => $usuario_id
        ]
    );

    flash()->push("mensagem", "Livro cadastrado com sucesso");
    header("Location: /meus-livros");
}


?>