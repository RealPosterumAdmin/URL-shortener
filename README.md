        URL-shortener

Задание на собеседование | Interview task
_____________________________________________________________________________________________________________________________________________

!!! Aдрес сайта пишется в /php/classes/UrlClass.php:16 и /index.php:196      
!!! Имя базы данных url_master, Файл для импорта /url_master.sql

!!!!!!!!!    Не забудьте добавить   !!!!!!!!!!!!!
___________________________________
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ php/main.php/$1 [L]
___________________________________
в ваш файл .htaccess

PHP-8.1 | MySQL-5.5 | Apache_2.4

---------------------------------------------------------------------------------------------------------------------------------------------

!!! The site address is written in /php/classes/UrlClass.php:16 and /index.php:196
!!! Database name url_master, Import file /url_master.sql

!!!!!!!!! Don't forget to add !!!!!!!!!!!!!!!
___________________________________
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ php/main.php/$1 [L]
___________________________________
to your .htaccess file


_____________________________________________________________________________________________________________________________________________

⚠️ Вводная информация ⚠️

⏰Срок выполнения: 2-4 дня.

📝 Цель: реализовать сократитель ссылок, по аналогии с vk.cc.

📋 Что должно быть:

Посетитель сайта вводит любой оригинальный URL-адрес в поле ввода.

Нажимает кнопку submit.

Страница делает ajax-запрос на сервер и получает уникальный короткий URL-адрес.

Сгенерированный URL-адрес отображается на странице в ответном сообщении.

Посетитель может скопировать короткий URL-адрес и повторить процесс с другой ссылкой.

⚠️Важно:

Использовать классы.
Не использовать фреймворк.
Короткий URL должен уникальным и перенаправлять на ссылку привязанную к данному URL.

💪 Приветствуется:

Реализация авторизации, где пользователь, создавший короткую ссылку может посмотреть статистику переходов по ней.
---------------------------------------------------------------------------------------------------------------------------------------------

⚠️ Introductory information ⚠️

⏰Completion time: 2-4 days.

📝 Goal: implement a link shortener, similar to vk.cc.

📋 What should be:

The site visitor enters any original URL into the input field.

Clicks the submit button.

The page makes an Ajax request to the server and receives a unique short URL.

The generated URL is displayed on the page in the response message.

The visitor can copy the short URL and repeat the process with another link.

⚠️Important:

Use classes.
Don't use the framework.
The short URL must be unique and redirect to a link associated with this URL.
💪 Be a plus::

Implementation of authorization, where the user who created the short link can view the statistics of clicks on it.
_____________________________________________________________________________________________________________________________________________

-------------------------- РЕЗУЛЬТАТ  ||  THE RESULT ------------------------------
Встроены все запрошенные функции и добавлены некоторые дополнительные функции.
Для Back-end полностью реализовано требование «Не использовать фреймворк». Для Front_end использовалось множество библиотек и плагинов.
Запрограммировано 35-40 часов. (при технических проблемах)
---------------------------------------------------------------------------------------------------------------------------------------------

All requested features have been built and some additional features have been added.
The requirement "Ne ispolzovat fraymvork" has been fully implemented for the Back-end. Many libraries and plugins were used for the Front-end.
35-40 Hours programmed. (with technical problems)

  

