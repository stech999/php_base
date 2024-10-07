<?php
// class A
// {
//     public function foo()
//     {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// $a1 = new A();
// $a2 = new A();
// $a1->foo();
// $a2->foo();
// $a1->foo();
// $a2->foo();

echo "\n в переменной (x) сохраняется результат от предыдущей вызова функции, поэтому результат 1234 \n";

echo "---- TASK2 ----\n";

class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A
{
}
$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

echo "класс (В) унаследуется от класса (А) и при этом никаких изменений не вносит, поэтому результат будет такой же 1234";