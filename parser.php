<?php

!isset($argv[1]) ? throw new Exception("No replay file specified") : NULL;
!file_exists($argv[1]) ? throw new Exception("Replay file not found") : NULL;

$validchars = array(
    "21", "22", "23", "24", "25", "26", "27", "28", "29", "2a", "2b", "2c", "2d", "2e", "2f", "30", 
    "31", "32", "33", "34", "35", "36", "37", "38", "39", "3a", "3b", "3c", "3d", "3e", "3f", "40", 
    "41", "42", "43", "44", "45", "46", "47", "48", "49", "4a", "4b", "4c", "4d", "4e", "4f", "50", 
    "51", "52", "53", "54", "55", "56", "57", "58", "59", "5a", "5b", "5c", "5d", "5e", "5f", "60", 
    "61", "62", "63", "64", "65", "66", "67", "68", "69", "6a", "6b", "6c", "6d", "6e", "6f", "70", 
    "71", "72", "73", "74", "75", "76", "77", "78", "79", "7a", "7b", "7c", "7d");

$teamvalidator = array(
    "10" => "Red",
    "11" => "Blue",
    "12" => "Green",
    "13" => "Yellow",
    "14" => "Purple",
    "15" => "Cyan",
);

$binary = bin2hex(file_get_contents($argv[1]));
$binary = trim(chunk_split($binary, 2, " "));

$chatinfo = '/0F (00|01|02|03|04|05|06) (00|01|02|03|04|05|06) (f.|0.|1.) (.*?) 00/mi';
preg_match_all($chatinfo, $binary, $chat, PREG_SET_ORDER, 0);

foreach ($chat as $text) {
    if($text[1] == $text[2] && in_array(substr($text[4], 0, 2), $validchars)) {
        switch($text[3]) {
            case 'ff': 
                echo "[Player ".$text['1']."] ".hex2bin(str_replace(" ", "", $text[4]))."\n"; break;
            case 'fe': 
                echo "Player ".$text['1']." is ".hex2bin(str_replace(" ", "", $text[4]))."\n"; break;
            case '10': case '11': case '12': case '13': case '14': case '15':
                echo "<<Player ".$text['1']." => Team ".$teamvalidator[$text[3]].">> ".hex2bin(str_replace(" ", "", $text[4]))."\n"; break;
            default: 
                echo "<<Player ".$text['1']." => Player ".$text[3].">> ".hex2bin(str_replace(" ", "", $text[4]))."\n"; break;
        }
    }
}

?>
