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
                <li><a class="font-semibold hover:underline" href="/meus-livros">Meus Livros</a></li>
            </ul>
            <ul>
                <li><a class="font-semibold hover:underline" href="/login">Fazer Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="mx-auto max-w-screen-xl py-6 px-8">
       <?php require("views/{$view}.view.php"); ?>
    </main>
</body>

</html>