<?php 
require("dados.php");

$id = $_REQUEST["id"];

$livroFiltrado = array_filter($livros, function($l) use ($id) {
    return $l["id"] == $id;
});

$livro = array_pop($livroFiltrado);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Book Wise</title>
</head>
<body class="bg-stone-900 text-white">
    <header class="bg-stone-800">
        <nav class="mx-auto max-w-screen-xl flex justify-between items-center py-6 px-8">
            <div class="font-bold text-2xl">Book Wise</div>
            <ul class="flex space-x-4">
                <li><a class="font-semibold hover:underline text-emerald-400" href="/">Explorar</a></li>
                <li><a class="font-semibold hover:underline" href="/meus-livros.php">Meus Livros</a></li>
            </ul>
            <ul>
                <li><a class="font-semibold hover:underline" href="/login.php">Fazer Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="mx-auto max-w-screen-xl py-6 px-8">
        <div class="mt-8 space-y-3">
            <h1 class="text-2xl font-bold">Explorar</h1>
            <form action="">
                <input
                class="bg-transparent border border-zinc-800 py-2 px-2 rounded-md" 
                type="text"
                name="pesquisar"
                id="pesquisar"
                placeholder="Pesquisar...">
                <button class="bg-emerald-500 border border-emerald-600 py-2 px-2 rounded-md">
                    Pesquisar
                </button>
            </form>
        </div>
        <section class="mx-auto max-w-screen-xl py-6">
                <div class="p-4 bg-transparent rounded-md hover:bg-zinc-800 border border-zinc-700">
                    <div class="flex gap-4">
                        <div class="w-1/3">
                            IMAGEM
                        </div>
                        <div>
                            <a class="font-semibold" href="/livro.php?id=<?= $livro["id"]; ?>">
                                Titulo
                            </a>
                            <div class="italic"><?= $livro["autor"]; ?></div>
                            <div><?= $livro["avaliacao"]; ?></div>
                        </div>
                    </div>
                    <div class="mt-4">
                    <?= $livro["descricao"]; ?>
                    </div>
                </div>
        </section>
    </main>
</body>
</html>
