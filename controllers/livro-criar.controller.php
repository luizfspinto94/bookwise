<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $descricao = $_POST["descricao"];
    $usuario_id = auth()->id;

    $dir = "images/";
    $arquivo = $dir . basename($_FILES["imagem"]["name"]);

    $novoNome = md5(rand());
    $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
    $imagem = $dir . $novoNome . '.' . $extensao;
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);

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
        query: "INSERT INTO livros(titulo, autor, descricao, usuario_id, imagens) VALUES(:titulo, :autor, :descricao, :usuario_id, :imagens)",
        class: Livro::class,
        params: [
            "titulo" => $titulo,
            "autor" => $autor,
            "descricao" => $descricao,
            "usuario_id" => $usuario_id,
            "imagens" => $imagem
        ]
    );

    flash()->push("mensagem", "Livro cadastrado com sucesso");
    header("Location: /meus-livros");
}


?>