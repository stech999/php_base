<!-- В контейнере с PHP CLI поменяйте версию PHP с 8.2 на 7.4. Изменится ли вывод?
Используя только две числовые переменные, поменяйте их значение местами. 
Например, если a = 1, b = 2, надо, чтобы получилось: b = 1, a = 2. 
Дополнительные переменные, функции и конструкции типа list() использовать нельзя. -->

<?php
echo 'Вывод PHP 7.4 <br>';
$a = 1;
$b = 2;
var_dump($a == $b);
var_dump((int)'012345');
var_dump((float)123.0 === (int)123.0);
var_dump(0 == 'hello, world');

$a = $b + $a;
$b = $a - $b;
$a = $a - $b;

echo '<br>';
echo "a = $a, b = $b";