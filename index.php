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

            <div class="mt-5 flex w-full flex-col lg:flex-row lg:justify-center lg:items-center gap-3 mx-auto lg:w-[90%]">
                <div class="lg:w-3/6">
                    <label class="block" for="buscador">Que Articulo Deseas Buscar?</label>
                    <input type="text" placeholder="Ingrese el Articulo a Buscar" id="buscador" class="p-3 rounded-lg w-full ">
                </div>
                <div class="lg:w-1/6">
                    <label class="block" for="idioma">Seleccionar Idioma</label>
                    <select name="idioma" id="idioma" class="p-3 w-full  rounded-lg">
                        <option value="es" selected>Español</option>
                        <option value="en">Ingles</option>
                    </select>
                </div>

                <div class="lg:w-1/6">
                    <label class="block" for="filtros">Ordenar Por</label>
                    <select name=" filtos" id="filtros" class="p-3 w-full rounded-lg">
                        <option value="relevance" selected>Relevancia</option>
                        <option value="create_timestamp_asc">Fecha de Creacion (Descendiente) </option>
                        <option value="create_timestamp_desc">Fecha de Creacion (Ascendente) </option>
                        <option value="last_edit_asc">Fecha de Edicion (Descendiente) </option>
                        <option value="last_edit_desc">Fecha de Edicion (Ascendente)</option>
                        <option value="size_asc">Tamaño de la Pagina (Ascendente)</option>
                        <option value="size_desc">Tamaño de la Pagina (Descendiente)</option>
                    </select>
                </div>
                <div class="flex flex-col justify-end lg:w-1/6">
                    <label class="block opacity-0"> '</label>
                    <input type="button" value="Buscar" class="p-2  rounded-lg w-full bg-sky-600 text-white text-lg cursor-pointer hover:bg-sky-700 transition-colors" id="btn-buscar">
                </div>
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