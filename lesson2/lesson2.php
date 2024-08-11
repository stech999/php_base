<!-- Урок 2. Условия, Массивы, циклы, функции

1. Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа, третий – операция. Обязательно использовать оператор return. -->

<?php
echo 'Задача 1';
echo '<br>';
function add($a, $b)
{
    return $a + $b;
}

function minus($a, $b)
{
    return $a - $b;
}
function delenie($a, $b)
{
    return $a / $b;
}
function umnozhenie($a, $b)
{
    return $a * $b;
}
print_r(umnozhenie(4, 2));
?>

<!-- 2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch). -->

<?php
echo '<br><br>';
echo 'Задача 2';
echo '<br>';
$arg1 = 6;
$arg2 = 3;
$operation = 'umnozhene';

function mathOperation($arg1, $arg2, $operation)
{

    switch ($operation) {
        case 'plus':
            echo $arg1 + $arg2;
            break;
        case 'minus':
            echo $arg1 - $arg2;
            break;
        case 'delenie':
            echo $arg1 / $arg2;
            break;
        case 'umnozhenie':
            echo $arg1 * $arg2;
            break;
        default:
            echo 'нету такой функции, вам доступны функции： plus, minus, delenie, umnozhenie';
            break;
    }
}
print_r(mathOperation($arg1, $arg2, $operation));
?>

<!-- 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы
с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким: Московская область: Москва, Зеленоград, Клин 
Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт 
Рязанская область … (названия городов можно найти на maps.yandex.ru). -->

<?php
echo '<br><br>';
echo 'Задача 3';
echo '<br>';
$regions =
    [
        "Московская область" => ["Москва", "Зеленоград", "Клин"],
        "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
        "Новосибирская область" => ["Новосибирск", "Бердск", "Искитим"]
    ];

foreach ($regions as $region => $cities) {
    echo $region . ": " . implode(", ", $cities) . "<br>";
}

?>


<!-- 4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские
буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). 
Написать функцию транслитерации строк. -->

<?php
echo '<br><br>';
echo 'Задача 4';
echo '<br>';

$alfhabet =
    [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'kh',
        'ц' => 'ts',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'shch',
        'ъ' => '',
        'ы' => 'y',
        'ь' => '',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya'
    ];

$text = 'привет как дела!';
$translit = strtr($text, $alfhabet);
echo $translit;
?>

<!-- 5. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val –
заданное число, $pow – степень.

плохо знаю рекурсию)

6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты. -->

<?php
echo '<br><br>';
echo 'Задача 6';
echo '<br>';
$hours = date('H');
$minutes = date('i');
function hours($hours)
{
    if ($hours == 00) {
        echo $hours . ' часов ';
    } elseif ($hours == 1) {
        echo $hours . ' час ';
    } elseif ($hours >= 2 && $hours <= 4) {
        echo $hours . ' часа ';
    } elseif ($hours >= 5 && $hours <= 20) {
        echo $hours . ' часов ';
    } elseif ($hours == 21) {
        echo $hours . ' час ';
    } elseif ($hours >= 22 && $hours <= 23) {
        echo $hours . ' часа ';
    }
}
function minutes($minutes)
{
    if ($minutes == 00) {
        echo $minutes . ' минут';
    } elseif ($minutes == 01) {
        echo $minutes . ' минута';
    } elseif ($minutes >= 02 && $minutes <= 04) {
        echo $minutes . ' минуты';
    } elseif ($minutes >= 5 && $minutes <= 20) {
        echo $minutes . ' минут';
    } elseif ($minutes == 21) {
        echo $minutes . ' минута';
    } elseif ($minutes >= 22 && $minutes <= 24) {
        echo $minutes . ' минуты';
    } elseif ($minutes >= 25 && $minutes <= 30) {
        echo $minutes . ' минут';
    } elseif ($minutes == 31) {
        echo $minutes . ' минута';
    } elseif ($minutes >= 32 && $minutes <= 34) {
        echo $minutes . ' минуты';
    } elseif ($minutes >= 35 && $minutes <= 40) {
        echo $minutes . 'минут';
    } elseif ($minutes == 41) {
        echo $minutes . ' минута';
    } elseif ($minutes >= 42 && $minutes <= 44) {
        echo $minutes . ' минуты';
    } elseif ($minutes >= 45 && $minutes <= 50) {
        echo $minutes . ' минут';
    } elseif ($minutes == 51) {
        echo $minutes . ' минута';
    } elseif ($minutes >= 52 && $minutes <= 54) {
        echo $minutes . ' минуты';
    } elseif ($minutes >= 55 && $minutes <= 59) {
        echo $minutes . ' минут';
    }
}

$nowTimes = hours($hours) . minutes($minutes);
echo $nowTimes;
?>