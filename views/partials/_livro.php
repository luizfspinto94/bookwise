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