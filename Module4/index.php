<?php
   phpinfo();

 /*   $x = "Hello";
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
        echo $y;
        echo $x;
    }
    localVariable();
   

    $x = 5;
    $y = 10;
    function sum(){
        global $x,$y;

        $y = $x + $y;
    }
    sum();
    echo $y;
 

 function callCounter(){
    static $count = 0;
    $count++;
    echo "The value of count variable is $count <br>";
 }
 callCounter();
 callCounter();


$sports = array('Football', 'Basketball', 'Handball', 'Voleyball');
$len = count($sports);
//echo count($sports); //[0],end
for($i = 0; $i <$len; $i++){
    echo $sports[$i], "<br>";
}

$sport = array('Football','Basketball','Handball','Voleyball','Golf');
array_push($sport, "Golf");
var_dump($sport);


$sport = array('Football','Basketball','Handball','Voleyball','Golf');
array_pop($sport);
var_dump($sport);


$sport = array('Football', 'Basketball', 'Handball', 'Volleyball');
array_unshift($sport,'Tenis');
var_dump($sport); 
*/

$sport = array('Football', 'Basketball', 'Handball', 'Volleyball');
array_shift($sport);
var_dump($sport) ;

?> 