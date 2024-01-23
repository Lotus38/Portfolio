<?php

$filepath = "C:\\xampp\\htdocs\\adventure\\games_list.json";

$json = file_get_contents($filepath);

$jsondecoded = json_decode($json, true);

$oplossing = "";

$characterCount = 0;

foreach ($jsondecoded as $game){

    if ($game[1] <= 7 && $game[2] == "Adventure"){
        $oplossing .= "#";
    }else{ 
        $oplossing .= ".";
    }

    $characterCount++;

    if ($characterCount % 18 == 0) {
        $oplossing .= "<br>";
    }
}

echo $oplossing;
