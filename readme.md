# Продвинутое программирование на PHP — Laravel
## Домашняя работа №9

---

Цели практической работы:

Научиться:

— создавать события и вызывать их;
— создавать слушатели и привязывать их к событию;
— применять наблюдатели моделей.

Что нужно сделать:

### 1. Создайте новый проект Laravel или откройте уже существующий.

---
![new project](storage/app/private/img/1_0.png "new project")

---

### 2. Создайте новую ветку вашего репозитория от корневой (main или master).

---
![new branch](storage/app/private/img/2_0.png "new branch")
![new branch](storage/app/private/img/2_1.png "new branch")
![new branch](storage/app/private/img/2_2.png "new branch")

---

### 3. Создайте миграцию командой php artisan make:migration CreateNewsTable со следующими полями:

---
![migration](storage/app/private/img/3_0.png "migration")

---
![migration](storage/app/private/img/3_1.png "migration")
![migration](storage/app/private/img/3_2.png "migration")
![migration](storage/app/private/img/3_3.png "migration")
![migration](storage/app/private/img/3_4.png "migration")

---

### 4. Создайте модель News.

---
![модель News](storage/app/private/img/4_0.png "модель News")

---

### 5. Создайте событие NewsHidden и присвойте полю класса $news параметр $news в конструкторе класса.

---
![NewsHidden](storage/app/private/img/5_0.png "NewsHidden")

---
![NewsHidden](storage/app/private/img/5_1.png "NewsHidden")

---

### 6. Создайте слушатель NewsHiddenListener, в котором опишите логику слушателя, используя функцию:
   Log::info(‘News ’ . $event->news->id . ‘ hidden’);.

---
![Listener NewsHiddenListener](storage/app/private/img/6_0.png "Listener NewsHiddenListener")

---

### 7. Зарегистрируйте событие и слушатель в классе EventServiceProvider.

---
![Registering event and listener](storage/app/private/img/7_0.png "Registering event and listener")

---


### 8. В файле routes/web.php создайте необходимый маршрут ‘/news/create-test’, использующий метод get для создания тестовой новости, и пропишите логику создания тестовой новости.

---
![route create-test](storage/app/private/img/8_0.png "route create-test")

---
![route create-test](storage/app/private/img/8_1.png "route create-test")
![route create-test](storage/app/private/img/8_2.png "route create-test")
![route create-test](storage/app/private/img/8_3.png "route create-test")

---

### 9. В файле routes/web.php создайте необходимый маршрут, использующий метод get ‘/news/{id}/hide’ для скрытия новости. Измените атрибут is_hidden на значение true. После этой операции вызовите событие NewsHidden с помощью инструкции NewsHidden::dispatch($news);.

---
![route hide](storage/app/private/img/9_0.png "route hide")

---
![route hide](storage/app/private/img/9_1.png "route hide")
![route hide](storage/app/private/img/9_2.png "route hide")
![route hide](storage/app/private/img/9_3.png "route hide")

---

### 10. В файле storage/logs/laravel.log проверьте, сработал ли слушатель, в нём должна появиться строка ‘News hidden 1’, где 1 — это id скрытой новости (может отличаться).

---
![laravel.log](storage/app/private/img/10_0.png "laravel.log")

---

### 11. Создайте класс-наблюдатель NewsObserver.

---
![NewsObserver](storage/app/private/img/11_0.png "NewsObserver")

---

### 12. Зарегистрируйте его в файле App\Providers\EventServiceProvider в функции boot.

---
![регистрация NewsObserver](storage/app/private/img/12_0.png "регистрация NewsObserver")
![регистрация NewsObserver](storage/app/private/img/12_1.png "регистрация NewsObserver")

---


### 13. Опишите логику изменения поля slug новости при вызове события saving в наблюдателе NewsObserver с помощью инструкции.

---
![slug](storage/app/private/img/13_0.png "slug")

---

Эта инструкция использует класс Str, который можно подключить с помощью инструкции в начале файла.

---
![класс Str](storage/app/private/img/13_1.png "класс Str")

---
![slug](storage/app/private/img/13_2.png "slug")

---

### 14. Создайте ещё одну новость с помощью маршрута ‘/news/create-test’.

---
![another news](storage/app/private/img/14_0.png "another news")

---

### 15. Проверьте заполнение поля slug через базу данных. Оно должно выглядеть следующим образом: «test-news-title» (если вы оставили такое же название, как в примере).

---
![заполнение поля slug через базу данных](storage/app/private/img/15_0.png "заполнение поля slug через базу данных")

---
