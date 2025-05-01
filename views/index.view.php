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
        <?php require("partials/_livro.php"); ?>
    <?php endforeach; ?>
</section>