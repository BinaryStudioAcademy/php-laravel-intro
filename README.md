#Guide + Конспект

##Инструкция по установке проекта
 *Должны быть предустановлены все зависимости*
- Выполнить команду <code>composer install</code>
- Выполнить команду <code>npm install</code>
- Создать файл .env и скопировать туда содержимое файла .env.example
- Выполнить команду <code>php artisan key:generate</code>
- *(Необязательно)* Выполнить команду <code>docker-compose exec app php artisan queue:table</code>
- Выполнить команду <code>php artisan migrate --seed</code>
- Выполнить команду <code>php artisan serve</code>
- *(Необязательно)* Выполнить команду <code>npm run watch</code>

##Инструкция по установке проекта через docker
 *Требуется пред установка docker, docker-compose* 
- Создать файл .env и скопировать туда содержимое файла .env.example
- Создать файл docker-compose.override.yml и скопировать туда содержимое файла docker-compose.override.yml.example
- Выполнить команду <code>docker-compose up -d</code>
- Выполнить команду <code>docker-compose exec app composer install</code>
- Выполнить команду <code>docker-compose exec app php artisan key:generate</code>
- *(Необязательно)* Выполнить команду <code>docker-compose exec app php artisan queue:table</code>
- Выполнить команду <code>docker-compose exec app php artisan migrate --seed</code>
- *(Необязательно)* Выполнить команду <code>npm run watch</code>

Наш сайт доступен http://0.0.0.0:8080/

##Laravel structure and Artisan
- Выполнить команду git checkout structure

Корневой каталог

Папка app, как вы можете догадаться, содержит код ядра вашего приложения. Ниже мы рассмотрим эту папку подробнее; однако, почти все классы вашего приложения будут находится в этой папке.

Папка bootstrap содержит файлы, которые загружают фреймворк и настраивают автозагрузку. Также в папке bootstrap находится папка cache, которая содержит сгенерированные фреймворком файлы для оптимизации производительности — например, кэш-файлы маршрутов и сервисов.

Папка config, как гласит её название, содержит все конфигурационные файлы ваших приложений. Будет не лишним прочитать эти файлы и ознакомиться со всеми доступными параметрами.

Папка database содержит миграции и классы для наполнения начальными данными вашей БД. При необходимости эту папку можно использовать для хранения базы данных SQLite.

Папка public содержит файл index.php, который является входной точкой для всех запросов, поступающих в ваше приложение. Также эта папка содержит ваши ресурсы, такие как изображения, JavaScript, CSS.

Папка resources содержит ваши представления, а также сырые, некомпилированные ресурсы, такие как LESS, SASS, JavaScript. А также здесь находятся все «языковые» файлы.

Папка routes содержит все определения маршрутов вашего приложения. По умолчанию в Laravel встроено три файла маршрутов web.php, api.php и console.php.

- Файл web.php содержит маршруты, которые RouteServiceProvider помещает в группу посредников web, которая обеспечивает состояние сессии, CSRF-защиту и шифрование cookie. Если ваше приложение не предоставляет «stateless» RESTful API, то скорее всего все ваши маршруты можно определить в файле web.php.

- Файл api.php содержит маршруты, которые RouteServiceProvider помещает в группу посредников api, которая обеспечивает ограничение скорости. Эти маршруты должны быть «stateless», т.е. входящие через эти маршруты запросы должны быть аутентифицированы с помощью токенов и они не будут иметь доступа к состоянию сессии.

- Файл console.php — то место, где вы можете определить все свои консольные команды на основе замыканий. Каждое замыкание привязывается к экземпляру команды, обеспечивая простое взаимодействие с методами ввода/вывода каждой команды. Несмотря на то, что в этом файле не определяются HTTP-маршруты, в нём определяются консольные входные точки (пути) в ваше приложение.

Папка storage содержит скомпилированные Blade-шаблоны, файл-сессии, кэши файлов и другие файлы, создаваемые фреймворком. Эта папка делится на подпапки app, framework и logs. В папке app можно хранить любые файлы, генерируемые вашим приложением. В папке framework хранятся создаваемые фреймворком файлы и кэш. А в папке logs находятся файлы журналов приложения.

Папку storage/app/public можно использовать для хранения пользовательских файлов, таких как аватарки, которые должны быть доступны всем. Вам надо создать символьную ссылку на public/storage, которая ведёт к этой папке. Вы можете создать ссылку командой php artisan storage:link.

Папка tests содержит ваши автотесты. Изначально там уже есть пример PHPUnit. Класс каждого теста должен иметь в имени суффикс Test. Вы можете запускать свои тесты командами phpunit и php vendor/bin/phpunit.

Папка vendor содержит ваши Composer-зависимости.

Основная часть вашего приложения находится в каталоге app. По умолчанию этот каталог зарегистрирован под пространством имён App и автоматически загружается с помощью Composer по стандарту автозагрузки PSR-4.

Вы можете изменить это пространство имён с помощью Artisan-команды app:name.

В каталоге app находится ряд дополнительных каталогов, таких как Console, Http и Providers. Можно сказать, что каталоги Console и Http предоставляют API ядра вашего приложения. Протокол HTTP и командная строка — это механизмы взаимодействия с вашим приложением, но они не содержат логики приложения. Другими словами, это просто два способа передачи команд вашему приложению. Каталог Console содержит все ваши Artisan-команды, а каталог Http содержит ваши контроллеры, посредники и запросы.

Многие другие каталоги будут созданы в каталоге app, когда вы выполните Artisan-команду make для генерирования классов. Например, каталог app/Jobs не будет создан, пока вы не выполните Artisan-команду make:job, чтобы сгенерировать класс задачи.

Многие классы в каталоге app можно сгенерировать Artisan-командами. Для просмотра доступных команд выполните в терминале команду php artisan list make.

Папка Console содержит все дополнительные Artisan-команды для вашего приложения. Эти команды можно сгенерировать командой make:command. Также этот каталог содержит ядро вашей консоли, где регистрируются ваши дополнительные Artisan-команды и определяются ваши запланированные задачи.

Изначально этого каталога нет, он создаётся Artisan-командами event:generate и make:event. В папке Events, как можно догадаться, хранятся классы событий. События можно использовать для оповещения других частей приложения о каком-либо событии, что обеспечивает большую гибкость и модульность.

Папка Exceptions содержит обработчик исключений вашего приложения. Эта папка также является хорошим местом для размещения всех исключений, возникающих в вашем приложении. Если вы хотите изменить то, как журналируются и отображаются ваши исключения, вам надо изменить класс Handler в этом каталоге.

Папка Http содержит ваши контроллеры, посредники и запросы форм. Здесь будет размещена почти вся логика обработки запросов, входящих в приложение.

Изначально этого каталога нет, он создаётся Artisan-командой make:job. В папке Jobs хранятся задачи для вашего приложения. Задачи могут быть обработаны вашим приложением в порядке очереди, а также их можно запустить синхронно в рамках прохождения текущего запроса. Иногда задачи, которые запускаются синхронно во время текущего запроса, называют «командами», потому что они реализуют шаблон Команда.

Изначально этого каталога нет, он создаётся Artisan-командами event:generate и make:listener. Папка Listeners содержит классы обработчиков для ваших событий. Слушатели событий получают экземпляр события и выполняют логику в ответ на это событие. Например, событие UserRegistered может быть обработано слушателем SendWelcomeEmail.

Изначально этого каталога нет, он создаётся Artisan-командой make:mail. Каталог Mail содержит все ваши классы, отвечающие за отправляемые вашим приложением email-сообщения. Почтовые объекты позволяют вам инкапсулировать всю логику создания email-сообщений в единый, простой класс, который можно отправить методом Mail::send().

Изначально этого каталога нет, он создаётся Artisan-командой make:notification. Каталог Notifications содержит все «транзакционные» уведомления, которые отправляются вашим приложением, например, простое уведомление о событии, произошедшем в вашем приложении. Возможность уведомлений в Laravel абстрагирует отправку уведомлений через разные драйверы, такие как email, Slack, SMS или сохранение в БД.

Папка Providers содержит все сервис-провайдеры для вашего приложения. Сервис-провайдеры загружают ваше приложение, привязывая сервисы в сервис-контейнер, регистрируя события, и выполняя любые другие задачи для подготовки вашего приложения к входящим запросам.

В свежеустановленном приложении Laravel эта папка уже содержит несколько провайдеров. При необходимости вы можете добавлять свои провайдеры в эту папку.

Изначально этого каталога нет, он создаётся Artisan-командой make:policy. Папка Policies содержит классы политик авторизации. Политики служат для определения, разрешено ли пользователю данное действие над ресурсом. Подробнее читайте в документации по авторизации.

В папке Commands, разумеется, хранятся команды для вашего приложения. Команды представляют собой задания, которые могут быть обработаны вашим приложениям в порядке очереди, а также задачи, которые вы можете запустить синхронно в рамках прохождения текущего запроса.

##Routing
- Выполнить команду git checkout routing
- https://laravel.su/docs/8.x/routing
- https://laravel.com/docs/8.x/routing

##Controllers
- Выполнить команду git checkout controllers
- https://laravel.com/docs/8.x/controllers
- https://laravel.su/docs/8.x/controllers

##Models
- Выполнить команду git checkout models
- https://laravel.com/docs/8.x/eloquent
- https://laravel.su/docs/8.x/eloquent

##Migrations, seeds, factories
- Выполнить команду git checkout migrations
- https://laravel.com/docs/8.x/migrations
- https://laravel.com/docs/8.x/seeding#writing-seeders
- https://laravel.com/docs/8.x/database-testing#defining-model-factories
- https://laravel.su/docs/8.x/seeding#writing-seeders
- https://laravel.su/docs/8.x/database-testing#defining-model-factories

##Middleware
- Выполнить команду git checkout middleware
- https://laravel.com/docs/8.x/middleware
- https://laravel.su/docs/8.x/middleware

##View
- Выполнить команду git checkout view
- Выполнить npm run watch
- https://laravel.com/docs/8.x/views
- https://laravel.su/docs/8.x/views

##Service Provider
- Выполнить команду git checkout service-provider
- https://laravel.com/docs/8.x/providers
- https://laravel.su/docs/8.x/providers

##Facades
- Выполнить команду git checkout facades
- https://laravel.com/docs/8.x/facades
- https://laravel.su/docs/8.x/facades

##Jobs
- Выполнить команду git checkout jobs
- https://laravel.com/docs/8.x/queues#creating-jobs
- https://laravel.su/docs/8.x/queues#creating-jobs


##Events. Notifications
- Выполнить команду git checkout notifications
- https://laravel.com/docs/8.x/notifications
- https://laravel.su/docs/8.x/notifications
- https://laravel.com/docs/8.x/events
- https://laravel.su/docs/8.x/events


## links
- https://laravel.com/
- https://www.docker.com/
- https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04
- https://github.com/laravel/framework
- https://www.statista.com/statistics/1124699/worldwide-developer-survey-most-used-frameworks-web/
- https://asperbrothers.com/blog/laravel-vs-symfony/
- https://en.wikipedia.org/wiki/Laravel
- https://trends.builtwith.com/framework/Laravel
- https://www.cyblance.com/php-framework/8-outstanding-php-laravel-features-that-reflect-over-the-frameworks-performance/
- https://packagist.org/packages/laravel/laravel
- https://packagist.org/packages/laravel/framework
- https://elisdn.ru/blog/148/dependency-injection
- https://laracasts.com/
- https://laracon.net/
- https://nova.laravel.com/
- https://phpunit.readthedocs.io/
