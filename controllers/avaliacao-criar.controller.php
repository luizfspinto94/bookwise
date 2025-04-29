<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $avaliacao = $_POST["avaliacao"];
    $nota = $_POST["nota"];
    $livro_id = $_POST["livro_id"];
    $usuario_id = auth()->id;

    $validacao = Validacao::validar([
        "avaliacao" => ["required"]
    ], $_POST);

    if ($validacao->naoPassou()) {
        header("Location:/livro?id=" . $livro_id);
        exit();
    }

    $avaliacao = $database->query(
        query: "insert into avaliacoes(avaliacao, nota, livro_id, usuario_id) values(:avaliacao, :nota, :livro_id, :usuario_id)",
        params: [
            "avaliacao" => $avaliacao,
            "nota" => $nota,
            "livro_id" => $livro_id,
            "usuario_id" => $usuario_id
        ]
    );

    if($avaliacao) {
        flash()->push("mensagem", "Avaliação criada com sucesso");
        header("Location:/livro?id=" . $livro_id);
    }
}
