<?php

//2. Read from a file using "fopen", 'fread', 'feof', 'fclose'
function readFromFile(){
    $file = fopen("example.txt", "r");

    //check if the file was opened sucsesfully]
    if($file){
         echo "content of example.txt";

         //read the file until the end (eof)
         while(! feof($file)){
            $line = fgets($file);
            echo htmlspecialchars(($line)."<br>");
         }
         fclose($file);
    }else{
        echo "Failed to open the file for reading";
    }
   
};

readFromFile();

?>