<?php

    //Functions for strings
    $message = "Today I'm going to learn a lot";

    //length
    echo strlen($message)."<br>";

    //number of words
    echo str_word_count($message)."<br>";

    //Reverse
    echo strrev("$message")."<br>";

    //finding text
    echo strpos($message, "lot")."<br>";

    //replacing text
    echo str_replace("a lot","very much", $message)."<br>";

    //changing to lower case
    echo strtolower($message)."<br>";

    //changing to upper case
    echo strtoupper($message)."<br>";

    //comparing strings
    echo strcmp("a","s")."<br>";

    //substracting string
    echo substr($message, 10)."<br>";
    echo substr($message, 10, 5)."<br>";

    //removing blanks
    echo trim("        Hola,      soy   Andrés");






?>