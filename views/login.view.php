<?php if (isset($mensagem)) : ?>
    <div class="mx-auto w-4/12 border border-emerald-700 p-4 mt-8 rounded-md text-emerald-400">
        <?= $mensagem ?>
    </div>
<?php endif; ?>
<div class="mx-auto w-4/12 border border-zinc-700 p-4 mt-8 rounded-md">
    <form action="" method="" class="p-6">
        <h1 class="mb-4 font-bold text-xl">Acessar minha conta</h1>
        <div class="space-y-4">
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
                <button class="bg-emerald-600 border border-emerald-600 py-2 px-2 rounded-md w-full font-semibold hover:bg-emerald-700">
                    Acessar minha conta
                </button>
            </div>
        </div>
    </form>
</div>