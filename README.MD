сервис поиска ближайшего адреса к текущему положению курьера. Сервис принимает долготу и широту текущего положения курьера в формате json и возвращает полное название ближайшего адреса тип строения, расстояние до него.

1. php artisan migrate
2. /importcsv
3. /nearest
4. app/Http/Controllers/CSVController, app/Http/Controllers/NearestBuildingController, app/Location, 
