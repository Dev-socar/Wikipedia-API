<?php
$idioma = isset($_POST['idiom']) ? $_POST['idiom'] : 'es';
$endPoint = "https://{$idioma}.wikipedia.org/w/api.php";
$params = [
    "action" => 'query',
    "list" => 'search',
    "srsearch" => $_POST['srsearch'],
    "format" => "json"
];
switch ($_POST['srsort']) {
    case 'relevance':
        $params["srsort"] = "relevance";
        break;
    case 'last_edit_asc':
        $params["srsort"] = "last_edit_asc";
        break;
    case 'last_edit_desc':
        $params["srsort"] = "last_edit_desc"; 
        break;
    case 'create_timestamp_asc':
        $params["srsort"] = "create_timestamp_asc"; 
        break;
    case 'create_timestamp_desc':
        $params["srsort"] = "create_timestamp_desc"; 
        break;
    case 'size_asc':
        $params["srsort"] = "relevance"; 
        break;
    case 'size_desc':
        $params["srsort"] = "relevance";
        break;
}

$url = $endPoint . '?' . http_build_query($params);


$response = file_get_contents($url);


if ($response === FALSE) {
    echo json_encode(['error' => 'Error al hacer la petición']);
    return;
}

echo $response;
return;
