<div class="mt-8 space-y-3">
    <h1 class="text-2xl font-bold">Explorar</h1>
    <form action="">
        <input
            class="bg-transparent border border-zinc-800 py-2 px-2 rounded-md outline-none"
            type="text"
            name="pesquisar"
            id="pesquisar"
            placeholder="Pesquisar...">
        <button class="bg-emerald-600 border border-emerald-600 py-2 px-2 rounded-md hover:bg-emerald-700 font-semibold">
            Pesquisar
        </button>
    </form>
</div>
<section class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-auto max-w-screen-xl py-6">
    <?php foreach ($livros as $livro): ?>
        <div class="p-4 bg-transparent rounded-md hover:bg-zinc-800 border border-zinc-700">
            <div class="flex gap-4">
                <div class="w-1/3">
                    IMAGEM
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
</section>