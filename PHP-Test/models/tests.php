<?php

class Tests
{


    private array $_test1;
    private array $_test2;
    private array $_test3;


    public function __construct()
    {
        $this->_test1 = array(

            'Язык программирования php нашел наиболее широкое применение в?' =>
            array(
                'Автоматизированном проектировании',
                'Разработке web-приложений',
                'Создании и управлении базами данных',
                1
            ),
            'Какими разделителями окружены скрипты php скрипта?' =>
            array(
                '&ltphp&gt … &lt/php&gt',
                '&lt? php … ?&gt',
                '&lt/&gt php &lt/&gt',
                1
            ),
            'Используя синтаксис языка php, напишите “Hello, World!”:' =>
            array(
                'printf “Hello, World!”',
                '&ltp&gt Hello, World! &lt/p&gt',
                'echo “Hello, World!”',
                2
            ),
            'С какого символа начинаются все переменные в php?' =>
            array(
                '&lt&gt',
                '$',
                '!',
                1
            ),
            'К какому языку программирования синтаксически наиболее близок php?' =>
            array(
                'C и Perl',
                '.Net',
                'VBScript',
                0

            ),
            'Перечислите основные типы данных в php' =>
            array(

                'Boolean, float, logic, text, subject, NULL',
                'String, boolean, text, massive, logic, NULL',
                'Boolean, integer, float, string, array, object, resource, NULL',
                2
            ),
            'В php используется … типизация данных?' =>
            array(
                'Динамическая',
                'Синтаксическая',
                'Коммутационная',
                0
            ),
            'Как правильно включить файл “time.inc”?' =>
            array(
                '&lt? php include "time.inc"?&gt',
                '&lt/&gt php include ‘time.inc’ &lt&gt',
                '&lt!-- include file="time.inc" --&gt',
                0
            ),
            'Укажите правильный способ создания функции в php:' =>
            array(
                'create newFunction()',
                'new_function newFunction()',
                'function newFunction()',
                2

            ),
            'Укажите неверно заданное имя:' =>
            array(
                '$my-Var',
                '$myVar',
                '$my_Var',
                0
            )

        );




        $this->_test2 = array(


            'Какие виды комментарий в PHP?' =>
            array(
                '//',
                '!!',
                '/**/',
                'answer' => array(
                    0,
                    2
                )

            ),
            'Укажите Варианты вывода строки в PHP' =>
            array(
                'echo "..."',
                'echo &lt&lt&ltp...p',
                'echo \'...\'',
                'answer' =>
                array(
                    0,
                    1,
                    2
                )

            ),
            'Какие из перечисленных тегов пригодны для открытия и закрытия PHP блока?' =>
            array(
                '&lt?php?&gt',
                '&lt! !&gt',
                '&lt?= ?&gt',
                'answer' =>
                array(
                    0
                )


            ),

            'Как можно подключить файл?' =>
            array(
                'Connect()',
                'require()',
                'include()',
                'answer' =>
                array(
                    1,
                    2
                )

            ),
            'Как отобразить текст с помощью PHP-скрипта?' =>
            array(
                'echo "Method 1"',
                'print "Method 2"',
                'text: Hello',
                'answer' =>
                array(
                    0,
                    1
                )

            ),
            'Какие глобальные переменные существуют в языке PHP?' =>
            array(
                '$_POST["var"]',
                '$_PAR["var"]',
                '$_VAR["VAR"]',
                'answer' =>
                array(
                    0
                )
            ),
            'Как можно приводить типы в PHP?' =>
            array(
                '(int), (integer)',
                '(float), (double), (real)',
                '(str)',
                'answer' =>
                array(
                    0,
                    1
                )
            ),
            'Сколько в PHP типов данных?' =>
            array(
                '8',
                '10',
                '6',
                'answer' =>
                array(
                    0
                )

            ),
            'Какие Циклы есть в PHP?' =>
            array(

                'for',
                'foreach',
                'while',
                'answer' =>
                array(
                    0,
                    1,
                    2
                )
            ),
            'Какие модификаторы доступа существуют в PHP?' =>
            array(
                'public',
                'internal',
                'private',
                'answer' =>
                array(
                    0,
                    2
                )

            )
        );
        $this->_test3 = array(
            'Какую функцию нужно использовать, чтобы объявить константу?' => "define()",
            'Какую функцию нужно использовать, чтобы установить cookie?' => "setcookie()",
            'В какой глобальной переменной находятся session данные?' => "\$_SESSION",
            'Какую функцию нужно использовать чтобы проверить наличие ключа  в массиве PHP?' => "array_key_exists()",
            'Какую функцию нужно использовать для перехода на другую станицу из PHP скрипта?' => "header()",
            'С помощью какой функции можно розбить строку на массив по разделителю?' => "explode()",
            'Как найти позицию первого вхождения подстроки в строку?' => "strpos()",
            'Какую функцию использовать чтобы перевернуть строку?' => "strrev()",
            'Какую функцию можно использовать, чтобы перемешать элементы массива?' => "shuffle()",
            'Как уничтожить все глобальные переменные сессии?' => "session_unset()"
        );
    }

    public function &GetTest1(): array
    {
        return $this->_test1;
    }
    public function &GetTest2(): array
    {
        return $this->_test2;
    }
    public function &GetTest3(): array
    {
        return $this->_test3;
    }
}
