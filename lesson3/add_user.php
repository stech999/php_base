<h4>1. Обработка ошибок. Посмотрите на реализацию функции в файле fwrite-cli.php в исходниках. Может ли пользователь ввести некорректную информацию (например, дату в виде 12-50-1548)? Какие еще некорректные данные могут быть введены? Исправьте это, добавив соответствующие обработки ошибок.</h4>
<form action="" method="post">
    <label for="">Введите имя</label><br>
    <input type="name" name="name" placeholder="Введите имя"><br>
    <label for="">Введите дату рождения в формате ДД-ММ-ГГГГ: </label><br>
    <input type="text" name="date" placeholder="дата рождения"><br>
    <input type="submit" placeholder="отправить">
</form>
<?php
$address = './user.txt';

$name = $_POST['name'];
$date = $_POST['date']; // сделал date как text, чтобы можно было сделать проверки как при консольном выводе, иначе можно было использовать type="date".

$valueFirst = substr($date, 0, 2);
$valueSecond = substr($date, 3, 2);
$valueThird = substr($date, 6, 4);
$nowYear = date('Y');

if ($valueFirst > 31 or $valueFirst < 0) {
    echo 'Ввели не верное число дня рождения!';
} elseif ($valueSecond > 12 or $valueFirst < 0) {
    echo 'Ввели не верное число месяца рождения!';
} elseif ($valueThird > $nowYear or $valueThird < 1900) {
    echo 'Ввели не верное число года рождения!';
} else {
    $data = $name . ", " . $date . "\r\n";
    $fileHandler = fopen($address, 'a');

    if (fwrite($fileHandler, $data)) {
        echo "Запись $data добавлена в файл $address";
    } else {
        echo "Произошла ошибка записи. Данные не сохранены";
    }

    fclose($fileHandler);
}
?>

<h4>2. Поиск по файлу. Когда мы научились сохранять в файле данные, нам может быть интересно не только чтение, но и поиск по нему. Например, нам надо проверить, кого нужно поздравить сегодня с днем рождения среди пользователей, хранящихся в формате:

Василий Васильев, 05-06-1992

И здесь нам на помощь снова приходят циклы. Понадобится цикл, который будет построчно читать файл и искать совпадения в дате. Для обработки строки пригодится функция explode, а для получения текущей даты – date.</h4>

<form action="" method="post">
    <label for="">Введите имя</label><br>
    <input type="name" name="name2" placeholder="Введите имя"><br>
    <label for="">Введите дату рождения в формате ДД-ММ-ГГГГ: </label><br>
    <input type="text" name="date2" placeholder="дата рождения"><br>
    <input type="submit" placeholder="отправить">
</form>

<?php
$name2 = $_POST['name2'];
$date2 = $_POST['date2'];

$file = fopen('file.txt', 'r');
while (($line = fgets($file)) !== false) {
    list($name2, $date2) = explode(', ', $line);
    $dateParts = explode('-', $date);
    $today = date('d-m-Y');
    $todayParts = explode('-', $today);
    if ($dateParts[0] == $todayParts[0] && $dateParts[1] == $todayParts[1]) {
        echo "Happy birthday, $name!\n";
    }
}
fclose($file);
?>
