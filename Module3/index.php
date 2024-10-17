<?php
  
//if statment , if....else statment, if.....elseif.....else statment, switch statmnent


//if statment
$num = -1;
if($num<0){
    echo"$num is leess than 0 <br>";
};
  

// if...else
$age = 19;
if($age>18){
    echo"You are an adoult <br>";
}else{
    echo"You are under 18 <br>";
};

if(($age>12) && ($age<20)){
    echo"discount for you <br>";
};


//if.....elseif.....else
if($num<0){
    echo"the value of $num is a negative number <br>.";
}elseif($num==0){
    echo"the value of $num is 0. <br>";
}else{
    echo"the value of $num is a postiive number.<br>";
};


$score = 99;
if($score > 90 && $score < 100){
    echo"Your grade is A";
}elseif($score>80){
    echo"Your grade is B";
}elseif($score>70){
    echo"Your grade is C";
}elseif($score>60){
    echo"Your grade is D";
}elseif($score<50){
    echo"Your grade is F";
};


//switch
$grade = "B";
switch($grade){
    case 'A':
        echo "Excellent! You got an A!";
        break;
    case 'B':
        echo "Good Job! You got a B";
        break;
    case 'C':
        echo "Well Done! You got a C";
        break;
    case 'D':
        echo "You passed . but study more";
        break;
    case 'F':
        echo "You failed the test you got a F";
        break;
    default:
    echo "Invalid grade";
    break;
}

?>