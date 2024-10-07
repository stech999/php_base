<?php

function fwrite_cli($filename, $data)
{
    $file = fopen($filename, 'a');
    if (!$file) {
        echo "Ошибка открытия файла: $filename\n";
        return false;
    }

    if (strpos($data, ',') !== false) {
        $parts = explode(',', $data);
        if (count($parts) !== 2) {
            echo "Некорректный формат даты!\n";
            fclose($file);
            return false;
        }

        $name = trim($parts[0]);
        $date = trim($parts[1]);

        if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $date)) {
            echo "проверка даты не прошла!\n";
            fclose($file);
            return false;
        }
        $nowYear = date('Y');
        list($day, $month, $year) = explode('-', $date);
        if ($month < 1 || $month > 12 || $day < 1 || $day > 31 || $year < 1900 || $year > $nowYear) {
            echo "Не верно ввели дату или вышли за диапозон не менее 1900 и не более текущего года!\n";
            fclose($file);
            return false;
        }

        $nameWithoutSpaces = str_replace(' ', '', $name);
        if (!mb_ereg_match('^[A-Za-zА-Яа-я]+$', $nameWithoutSpaces)) {
            echo "Имя должно содержать только латинские буквы!\n";
            fclose($file);
            return false;
        }

    } else {
        echo "Некорректный формат данных!\n";
        fclose($file);
        return false;
    }

    fwrite($file, "$name, $date\n");
    fclose($file);
    echo "Данные успешно записаны в файл!\n";
    return true;
}

function find_by_date($filename, $date)
{
    $file = fopen($filename, 'r');
    if (!$file) {
        echo "Ошибка открытия файла: $filename\n";
        return false;
    }

    $found = false;
    while (!feof($file)) {
        $line = fgets($file);
        $parts = explode(',', $line);
        if (count($parts) === 2 && trim($parts[1]) === $date) {
            echo "Найдена строка: $line\n";
            $found = true;
            break;
        }
    }
    if (!$found) {
        echo "Такой " . $date . " в базе данных нету!\n";
    }

    fclose($file);
    return $found;
}

function delete_line($filename, $search_value)
{
    $tempFile = tempnam(sys_get_temp_dir(), 'temp');

    $file = fopen($filename, 'r');
    $temp = fopen($tempFile, 'w');

    if (!$file || !$temp) {
        echo "Ошибка открытия файла!\n";
        return false;
    }

    $found = false;
    while (!feof($file)) {
        $line = fgets($file);
        $parts = explode(',', $line); // Разбиваем строку по запятой
        if (count($parts) === 2) {
            $name = trim($parts[0]);
            $date = trim($parts[1]);

            // Проверяем, совпадает ли введенное значение с именем или датой
            if ($search_value === $name || $search_value === $date) {
                $found = true; // Строка найдена
            } else {
                fwrite($temp, $line); // Записываем строку во временный файл
            }
        }
    }

    fclose($file);
    fclose($temp);

    if ($found) {
        rename($tempFile, $filename); // Перемещаем временный файл на место исходного
        echo "Строка успешно удалена!\n";
        return true;
    } else {
        unlink($tempFile); // Удаляем временный файл, если строка не найдена
        echo "Строка не найдена.\n";
        return false;
    }
}

function show_all_records($filename)
{
    $file = fopen($filename, 'r');
    if (!$file) {
        echo "Ошибка открытия файла: $filename\n";
        return false;
    }

    echo "Записи в файле:\n";
    while (!feof($file)) {
        $line = fgets($file);
        echo trim($line) . "\n";
    }

    fclose($file);
    return true;
}

$filename = 'data.txt';

while (true) {
    echo "Выберите действие:\n";
    echo "1. Добавить запись\n";
    echo "2. Найти запись по дате\n";
    echo "3. Удалить запись\n";
    echo "4. Показать все записи\n";
    echo "5. Выйти\n";

    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case 1:
            echo "Введите имя и дату рождения (формат Имя Фамилия, ДД-ММ-ГГГГ): ";
            $data = trim(fgets(STDIN));
            fwrite_cli($filename, $data);
            break;
        case 2:
            echo "Введите дату (формат ДД-ММ-ГГГГ): ";
            $date = trim(fgets(STDIN));
            find_by_date($filename, $date);
            break;
        case 3:
            echo "Введите имя или дату для удаления: ";
            $search_value = trim(fgets(STDIN));
            delete_line($filename, $search_value);
            break;
        case 4:
            show_all_records($filename);
            break;
        case 5:
            exit;
        default:
            echo "Неверный выбор!\n";
    }
}