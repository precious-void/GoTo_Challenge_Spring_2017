# GoTo_Challenge_Spring_2017

## Инструкция по установке
1. Установите библиотеку pyTelegramBotAPI.
> pip install pyTelegramBotAPI<br>
>[pyTelegramBotAPI](https://github.com/eternnoir/pyTelegramBotAPI)
2. Установите и запустите сервер Apache.
> http://httpd.apache.org/download
3. Откройте папку с проектом в браузере.
> localhost/<путь к папке>/admin
4. Введите **логин**: *admin*, **Пароль** : *admin*.
5. Введите токен вашего бота, выданный [@BotFather](https://telegram.me/botfather).
6. Придумайте пароль для админов и пользователей и нажмите кнопку сохранить.
7. Запустите файл gotobot.py в папке bot.
8. Бот готов к работе!

## Описание работы с ботом

### Регистрация
После того, как вы запустили файл gotobot.py, напишите своему боту комманду /start. 
Он запросит пароль, введенный вами в веб-сервисе
> *admin* (Пароль для админа)<br>
> *user* (Пароль для юзера)

Регистрация администратора | Регистрация юзера
------------ | -------------
![Регистрация админа](/screenshots/registeradmin.PNG)|![Регистрация юзера](/screenshots/registeruser.PNG)

### 🛠 Комманды
С помощью кнопки 🛠 Комманды или комманды /help можно узнать доступные тебе комманды и их описание.

Админ | Юзер
------------ | -------------
![Комманды админа](/screenshots/commandsadmin.png)|![Комманды юзера](/screenshots/commandsuser.png)
