<?php

/** @var Livro $livro */
?>

<div class="p-4 bg-transparent rounded-md hover:bg-zinc-800 border border-zinc-700">
    <div class="flex gap-4">
        <div class="w-1/3">
            IMAGEM
        </div>
        <div>
            <a class="font-semibold" href="/livro?id=<?= $livro->id; ?>">
                Titulo
            </a>
            <div class="italic"><?= $livro->autor; ?></div>
        </div>
    </div>
    <div class="mt-4">
        <?= $livro->descricao; ?>
    </div>
</div>

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


<div class="grid grid-cols-2 gap-4 mt-12">
    <!-- Lista de Avaliações (ocupa mais espaço) -->
    <div class="col-span-1 flex-1">
        <div class="border border-zinc-700 p-4 rounded-md space-y-4">
            <h1 class="text-xl font-bold">skdksmdkmskdms</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore ipsam sed corrupti expedita quam accusantium iure asperiores provident ipsa sequi praesentium corporis, nemo fugiat odit sit eveniet rem quae laboriosam?</p>
        </div>
    </div>

    <!-- Formulário (máximo 400px de largura, alinhado à direita) -->
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