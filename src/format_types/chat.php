<?php

namespace MeTonaTOR\Formats\Chat;

class ChatMetadata {
    public $bytes;
    function __construct($bytes) {
        $bytes != NULL ? $this->bytes = $bytes : throw new \Exception("Invalid bytes");
    }
    public function read() {
        preg_match_all(\MeTonaTOR\Enums\Regexes::CHAT, $this->bytes, $chat, PREG_SET_ORDER, 0);
        $validchars = array_map('strtolower', array_map('dechex', range(32, 125)));

        foreach ($chat as $text) {
            //var_dump($text);
            if(($text[1] == $text[2] || $text[2] == "ff") && in_array(substr($text[4], 0, 2), $validchars)) {
                switch($text[3]) {
                    case 'ff': 
                        if($text[2] == "ff") {
                            echo "[Anon by ".$text['1']."] ".hex2bin(str_replace(" ", "", $text[4]))."\n"; break;
                        } else {
                            echo "[Player ".$text['1']."] ".hex2bin(str_replace(" ", "", $text[4]))."\n"; break;
                        }
                    case 'fe': 
                        echo "Player ".$text['1']." is ".hex2bin(str_replace(" ", "", $text[4]))."\n"; break;
                    case '10': case '11': case '12': case '13': case '14': case '15':
                        $colors = array_flip((new \ReflectionClass('\MeTonaTOR\Enums\TeamColors'))->getConstants());
                        echo "<<Player ".$text['1']." => Team ".$colors[$text[3]].">> ".hex2bin(str_replace(" ", "", $text[4]))."\n"; break;
                    default: 
                        echo "<<Player ".$text['1']." => Player ".$text[3].">> ".hex2bin(str_replace(" ", "", $text[4]))."\n"; break;
                }
            }
        }
    }
}

?>