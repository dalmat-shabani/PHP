<?php
    phpinfo();

    $x = "Hello";
    print_r($x);

    $x = 5;
    echo gettype($x) . "<br>";
    $y = 15.3;
    echo gettype($y) . "<br>";
    $z = "Hello";
    echo gettype($z) . "<br>";

    function displayPHPVersion()
    {
        echo "This is PHP" . phpversion();
        echo "\n";
    }
    displayPHPVersion();

    function helloWorld() {
        echo "Hello World";
    }
    helloWorld(); //calls the function

    function foo($arg_1, $arg_2, $arg_n){
        echo "Example function. \n";
        $returnValue = "Some Value";
        return $returnValue;
    }

    function sum(){
        $value = 120 + 20;
        echo $value;
    }
    sum();

   

    function fully_divisible($n) {
        if(($n%2)==0){
            return "$n is fully divisible by 2";
        }else{
            return "$n is not fully divisible by 2";
        }
    }
    print_r(fully_divisible(4) . "<br>");
    print_r(fully_divisible(36) . "<br>");
    print_r(fully_divisible(16) . "<br>");
    print_r(fully_divisible(5) . "<br>");

    $x = 5; //global variable
    function localVariable(){
        global $x;
        $y = 10; //local variable
        echo "$x <br>";
        echo "$y <br>";
    }
    localVariable();
?> 