# Guest Book

Требования: PHP 5.5+ (используется функция password_hash)

После восстановаления бэкапа БД `guestbook.sql` прописать параметры подключения к базе данных в файле `/engine/config.php`

```php
//Database connection
define('DB_HOST', "localhost");
define('DB_NAME', "guestbook");
define('DB_CHARSET', "utf8");
define('DB_USER', "");
define('DB_PASSWORD', "");
```

На книге может зарегистрироваться любой пользователь.

Тестовая учетка администратора:

```
trev@smith.com
1111
```

[Рабочий пример](http://35.157.21.3/)
