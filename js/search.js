import {
  inputSearch,
  selectFilter,
  results,
  resultsHeading,
  selectIdioms
} from "./selectores.js";

const getData = (e) => {
  e.preventDefault();
  if (inputSearch.value.trim() === "") {
    inputSearch.classList.add("border", "border-red-600");
    return;
  }
  if (inputSearch.classList.contains("border")) {
    inputSearch.classList.remove("border", "border-red-600");
    return;
  }
  // Hacer la petición
  callAPI();
};

const callAPI = async () => {
  const data = new FormData();
  data.append("srsearch", inputSearch.value);
  data.append("srsort", selectFilter.value);
  data.append("idiom", selectIdioms.value);
  const url = "./API/search.php";
  try {
    spinner();
    const response = await fetch(url, {
      method: "POST",
      body: data,
    });
    const result = await response.json();

    let articles = result.query.search;
    if (selectFilter.value === "size_asc") {
      articles = sortBySize(articles, false); // De mayor a menor tamaño
    }
    if (selectFilter.value === "size_desc") {
      articles = sortBySize(articles, true); // De menor a mayor tamaño
    }
    printData(articles);
  } catch (error) {
    console.log(error);
  }
};

const sortBySize = (data, ascending = true) => {
  return data.sort((a, b) => (ascending ? a.size - b.size : b.size - a.size));
};

const printData = (articles) => {
  if (articles.length === 0) {
    resultsHeading.textContent = `No se Encontraron Articulos de '${inputSearch.value}'`;
    if (document.querySelector(".sk-chase")) {
      document.querySelector(".sk-chase").remove();
    }
    return;
  }
  resultsHeading.textContent = `Articulos Sobre '${inputSearch.value}' ordenados '${selectFilter.selectedOptions[0].textContent}'`;
  limpiarHTML();
  articles.forEach((article) => {
    const { title, snippet, timestamp } = article;
    const url = `https://es.wikipedia.org/wiki/${encodeURIComponent(title)}`;

    const articleElement = document.createElement("article");
    articleElement.classList.add("p-4", "rounded-md", "shadow-sm", "bg-white");
    const articleTitle = document.createElement("h3");
    articleTitle.classList.add("text-xl", "font-semibold");
    articleTitle.textContent = title;
    const articleFecha = document.createElement("p");
    articleFecha.classList.add("text-lg", "text-sky-600");
    articleFecha.textContent = formatDate(timestamp);
    const articleParrafo = document.createElement("p");
    articleParrafo.classList.add("text-sm", "text-gray-400");
    articleParrafo.textContent = cleanSnippet(snippet);
    const articleUrl = document.createElement("a");
    articleUrl.classList.add(
      "font-semibold",
      "cursor-pointer",
      "p-2",
      "bg-sky-600",
      "text-white",
      "rounded-lg",
      "block",
      "w-max",
      "mt-3"
    );
    articleUrl.href = url;
    articleUrl.textContent = "Visitar Articulo";
    articleUrl.target = "_blank";

    articleElement.appendChild(articleTitle);
    articleElement.appendChild(articleFecha);
    articleElement.appendChild(articleParrafo);
    articleElement.appendChild(articleUrl);

    results.appendChild(articleElement);
  });
};

const cleanSnippet = (snippet) => {
  return snippet.replace(/<[^>]*>?/gm, "");
};

const limpiarHTML = () => {
  while (results.firstChild) {
    results.removeChild(results.firstChild);
  }
};

const formatDate = (date) => {
  const dateFormatted = new Date(date);

  const options = {
    year: "numeric",
    month: "long",
    day: "numeric",
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit",
    timeZoneName: "short",
  };

  return dateFormatted.toLocaleDateString("es-MX", options);
};

function spinner() {
  limpiarHTML();
  const spinner = document.createElement("div");
  spinner.classList.add("sk-chase");
  spinner.innerHTML = `
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    `;
  results.appendChild(spinner);
}

export { getData };
