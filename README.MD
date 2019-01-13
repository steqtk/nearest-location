сервис поиска ближайшего адреса к текущему положению курьера. Сервис принимает долготу и широту текущего положения курьера в формате json и возвращает полное название ближайшего адреса тип строения, расстояние до него.

1. php artisan migrate
2. в браузере /importcsv, выбираем locations.csv, для заполнения БД
3. по адресу /nearest принимаем координаты
4. app/Http/Controllers/CSVController, app/Http/Controllers/NearestBuildingController, app/Location, 
