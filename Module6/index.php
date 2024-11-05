<?php
echo"script is running";

// Function to write a message to a file
function writeToFile($message) {
    // Open the file in append mode
    $file = fopen("example.txt", "a");
    
    // Check if the file was successfully opened
    if ($file) {
        // Write the message to the file
        fwrite($file, $message . PHP_EOL);

        // Close the file
        fclose($file);

        echo"Message written sucsesfully";
    } else {
        // Display an error if the file could not be opened
        echo "Could not open the file!";
    }
}



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

//3.Write a single line to the file using file_put_contents
function quickWriteToTheFile($message){
    file_put_content("example.txt", $message.PHP_EOL);
    echo"Message written to the file using";
};


writeToFile("This is a simple log message!");
quickWriteToTheFile("This will overwrite everything with a new message");
readFromFile();


?> 