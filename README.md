# php2

Домашнее задание №6

1. Согласно стандарту PSR-2 поправил открывающие скобки у классов, методов и функций
2. Подключил с помощью composer библиотеку swiftmailer/swiftmailer
3. Организовал отправку сообщения администратору при возникновении проблем с подключением к базе данных.
    Для удобства создал собственный класс \App\Classes\SendMail, который при создании в конструкторе получает
    данные из конфига и сохраняет в себе. В конфиге почтовые данные отправителя и получателя (логин, пароль и т.д.).
    Конфиг в git не добавлял! У класса \App\Classes\SendMail создал функцию send(), которая и работает с библитекой
    swiftmailer/swiftmailer.
4. Оформил пакет composer "multiexception". Ссылка https://packagist.org/packages/customer41/multiexception.
    Ссылка на репозиторий на гитхабе: https://github.com/customer41/multiexception
    А также установил через composer и использовал в своём проекте.

Домашнее задание №7

1. Создал метод queryEach() в классе Db. Использовал его в методе findLast() абстрактной модели. Циклом foreach
    прошелся по генератору в index.php
2. Создал класс AdminDataTable по заданию
3. В админ-контроллере создал метод actionShowAuthors(), который выводит всех авторов в виде таблицы, используя класс
    AdminDataTable