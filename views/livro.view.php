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