<?php
class UserController {

    public function save() {
        $name = $_GET['name'];
        $birthday = $_GET['birthday'];

        // Валидация данных (необходимо добавить)

        // Сохранение данных в хранилище (например, в файл, базу данных)
        // ...

        // Перенаправление на другую страницу (по желанию)
        header('Location: /');
        exit;
    }
}