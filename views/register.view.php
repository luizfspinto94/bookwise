<?php if ($validacoes = flash()->get("validacoes_registrar")) : ?>
    <div class="mx-auto w-4/12 border border-yellow-600 p-3 mt-8 rounded-md text-yellow-400">
        <ul>
            <?php foreach ($validacoes as  $validacao): ?>
                <li class="flex justify-between gap-3 items-center">
                    <?= $validacao ?> <span class="text-xs">⚠️</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="mx-auto w-4/12 border border-zinc-700 p-4 mt-8 rounded-md">
    <form action="/register" method="POST" class="p-6">
        <h1 class="mb-4 font-bold text-xl">Olá, crie a sua conta agora</h1>
        <div class="space-y-4">
        <div>
                <label class="block mb-2" for="nome">Nome</label>
                <input
                class="bg-transparent border border-zinc-700 py-2 px-2 rounded-md outline-none w-full"
                type="text"
                name="nome"
                id="nome"
                placeholder="Informe o seu nome">
            </div>
            <div>
                <label class="block mb-2" for="email">Email</label>
                <input
                class="bg-transparent border border-zinc-700 py-2 px-2 rounded-md outline-none w-full"
                type="text"
                name="email"
                id="email"
                placeholder="Informe o seu email">
            </div>
            <div>
                <label class="block mb-2" for="senha">Senha</label>
                <input
                class="bg-transparent border border-zinc-700 py-2 px-2 rounded-md outline-none w-full"
                type="password"
                name="senha"
                id="senha"
                placeholder="Informe sua senha">
            </div>
            <div>
            <button type="submit" class="bg-emerald-600 border border-emerald-600 py-2 px-2 rounded-md w-full font-semibold hover:bg-emerald-700">
            Criar Conta
            </button>
            </div>
        </div>
    </form>
</div>