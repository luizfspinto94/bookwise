<?php

/** @var Livro $livro */
?>

<?php require("partials/_livro.php"); ?>


<?php if ($mensagem = flash()->get("mensagem")) : ?>
    <div class="w-4/12 border border-emerald-600 p-3 mt-8 rounded-md text-emerald-400 flex justify-between gap-3 items-center">
        <?= $mensagem ?> <span class="text-xs">✅</span>
    </div>
<?php endif; ?>

<?php if ($validacoes = flash()->get("validacoes")) : ?>
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


<div class="grid grid-cols-2 gap-4 mt-6">
    <div class="col-span-1 grid gap-4">
        <?php if($avaliacoes): ?>
        <?php foreach ($avaliacoes as $avaliacao): ?>
        <div class="col-span-1 flex-1">
            <div class="border border-zinc-700 p-4 rounded-md space-y-4">
                <h1 class="text-xl font-bold">Avaliacão Livro: <?= $livro->titulo; ?></h1>
                <p><?= $avaliacao->avaliacao; ?></p>
                <p><?= $avaliacao->nota; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
            <div>Não há nenhuma avaliação criada ainda para este livro!</div>
        <?php endif; ?>
    </div>

    <div class="col-span-1 w-[450px] ml-auto border border-zinc-700 p-4 rounded-md">
        <form action="/avaliacao-criar" method="POST" class="space-y-4">
            <h2 class="text-lg font-semibold mb-2">Deixe sua avaliação sobre o Livro 📚</h2>
            <div>
                <input type="hidden" 
                name="livro_id" 
                id="livro_id" 
                value="<?= $livro->id; ?>">
            </div>
            <div>
                <label class="block mb-2" for="avaliacao">Avaliação</label>
                <textarea
                    class="w-full bg-transparent border border-zinc-800 py-2 px-2 rounded-md outline-none"
                    name="avaliacao"
                    id="avaliacao"
                    placeholder="Escreva aqui sua avaliação..."></textarea>
            </div>
            <div>
                <label class="block mb-2" for="nota">Nota</label>
                <select value="nota" class="w-full bg-transparent border border-zinc-800 py-2 px-2 rounded-md outline-none"
                    name="nota"
                    id="nota">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-emerald-600 border border-emerald-600 py-2 px-2 rounded-md w-full font-semibold hover:bg-emerald-700">
                    Enviar Avaliação
                </button>
            </div>
        </form>
    </div>
</div>