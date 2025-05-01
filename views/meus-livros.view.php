<?php

/** @var Avaliacao $avaliacao */
?>

<?php if ($mensagem = flash()->get("mensagem")) : ?>
    <div class="w-4/12 border border-emerald-600 p-3 mt-8 rounded-md text-emerald-400 flex justify-between gap-3 items-center">
        <?= $mensagem ?> <span class="text-xs">✅</span>
    </div>
<?php endif; ?>

<?php if ($validacoes = flash()->get("validacoes_livro")) : ?>
    <div class="w-4/12 border border-yellow-600 p-3 mt-8 rounded-md text-yellow-400">
        <ul>
            <?php foreach ($validacoes as $validacao): ?>
                <li class="flex justify-between gap-3 items-center">
                    <?= $validacao ?> <span class="text-xs">⚠️</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>


<div class="grid grid-cols-2 mt-6">
    <div class="col-span-1 grid gap-4">
        <!-- Lista de Avaliações (ocupa mais espaço) -->
        <?php if($livros): ?>
        <?php foreach ($livros as $livro): ?>
            <div class="p-4 bg-transparent rounded-md hover:bg-zinc-800 border border-zinc-700">
            <div class="flex gap-4">
                <div class="w-1/3">
                    <img src="<?= $livro->imagens; ?>" alt="Imagem">
                </div>
                <div>
                    <a class="font-semibold" href="/livro?id=<?= $livro->id; ?>">
                        <?= $livro->titulo; ?>
                    </a>
                    <div class="italic"><?= $livro->autor; ?></div>
                </div>
            </div>
            <div class="mt-4">
                <?= $livro->descricao; ?>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
            <div>Não há livro criado ainda!</div>
        <?php endif; ?>
    </div>

    <!-- Formulário (máximo 400px de largura, alinhado à direita) -->
    <div class="col-span-1 w-[450px] ml-auto border border-zinc-700 p-4 rounded-md">
        <form action="/livro-criar" method="POST" class="space-y-4" enctype="multipart/form-data">
            <h2 class="text-lg font-semibold mb-2">Cadastre seu Livro 📚</h2>
            <div>
                <label class="block mb-2" for="imagem">Imagem do Livro</label>
                <input
                    type="file"
                    class="w-full bg-transparent border border-zinc-800 py-2 px-2 rounded-md outline-none"
                    name="imagem"
                    id="imagem">
            </div>
            <div>
                <label class="block mb-2" for="titulo">Titulo</label>
                <input
                    type="text"
                    class="w-full bg-transparent border border-zinc-800 py-2 px-2 rounded-md outline-none"
                    name="titulo"
                    id="titulo"
                    placeholder="Digite o titulo...">
            </div>
            <div>
                <label class="block mb-2" for="autor">Autor</label>
                <input
                    type="text"
                    class="w-full bg-transparent border border-zinc-800 py-2 px-2 rounded-md outline-none"
                    name="autor"
                    id="autor"
                    placeholder="Digite o autor...">
            </div>
            <div>
                <label class="block mb-2" for="descricao">Descrição</label>
                <textarea
                    type="text"
                    class="w-full bg-transparent border border-zinc-800 py-2 px-2 rounded-md outline-none"
                    name="descricao"
                    id="descricao"
                    placeholder="Escreva aqui sua descrição para o Livro..."></textarea>
            </div>
            <div>
                <button type="submit" class="bg-emerald-600 border border-emerald-600 py-2 px-2 rounded-md w-full font-semibold hover:bg-emerald-700">
                    Cadastrar Livro
                </button>
            </div>
        </form>
    </div>
</div>