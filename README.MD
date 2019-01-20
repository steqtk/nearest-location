сервис поиска ближайшего адреса к текущему положению курьера. Сервис принимает долготу и широту текущего положения курьера в формате json и возвращает полное название ближайшего адреса тип строения, расстояние до него.

1. php artisan migrate
2. открываем /importcsv, выбираем locations.csv, для заполнения БД
3. по адресу /nearest принимаем координаты
4. app/Http/Controllers/CSVController, app/Http/Controllers/NearestBuildingController, app/Location, 

------------------------------------------------------------------------------------------------------------------------------
Проверка запросов:

```
<?php
header('Content-Type: application/json');
echo json_encode([
    'method' => $_SERVER['REQUEST_METHOD'],
    'uri' => $_SERVER['REQUEST_URI'],
    'body' => file_get_contents('php://input'),
    'headers' => getallheaders(),
], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
