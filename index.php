<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <title>ADA 01 | Omar Solis Carvajal</title>
</head>

<body class="bg-gray-50">
    <header class="w-full px-4 pt-10 ">
        <div class="flex justify-center flex-col">
            <h1 class="text-center text-2xl font-semibold">WikipediaAPI</h1>

            <div class="mt-5 flex w-full flex-col lg:flex-row lg:justify-center gap-3 mx-auto lg:w-[80%]">
                <input type="text" placeholder="Que desea buscar?" id="buscador" class="p-3 rounded-lg lg:w-2/4">
                <select name="filtos" id="filtros" class="p-3 lg:w-1/4 rounded-lg">
                    <option value="relevance" selected>Por Relevancia</option>
                    <option value="create_timestamp_asc">Por Fecha de Creacion de la más Antigua a la más Reciente </option>
                    <option value="create_timestamp_desc">Por Fecha de Creacion de la más Reciente a la más Antigua </option>
                    <option value="last_edit_asc">Por Fecha de Edicion de la más Antigua a la más Reciente </option>
                    <option value="last_edit_desc">Por Fecha de Edicion de la más Reciente a la más Antigua </option>
                    <option value="size">Por Tamaño de la Pagina</option>
                </select>
                <input type="button" value="Buscar" class="p-2 lg:w-1/4 rounded-lg w-full bg-sky-600 text-white text-lg cursor-pointer hover:bg-sky-700 transition-colors" id="btn-buscar">
            </div>
        </div>
    </header>
    <main class="w-[90%] mt-10 mx-auto p-3">
        <h2 class="text-2xl font-semibold resultados-heading text-gray-400">Aun no se Realiza Alguna Busqueda</h2>
        <section id="resultados" class="grid gap-3 mt-10">

        </section>
    </main>

    <script type="module" src="./js/index.js"></script>
</body>

</html>