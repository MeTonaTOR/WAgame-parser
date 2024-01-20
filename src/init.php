<?php

namespace MeTonaTOR;

include_once "format_types/chat.php";
include_once "format_types/map.php";
include_once "format_types/schemes.php";
include_once "helpers/enums.php";

class WAgame_parser {
    private $bytes;
	private $length = 0;
	private $position = 0;

    function __construct($filename) {
        !isset($filename) ? throw new \Exception("No file specified") : NULL;
        !file_exists($filename) ? throw new \Exception("File not found") : NULL;
        
        $binary = bin2hex(file_get_contents($filename));
        strlen($binary) == 0 ? throw new \Exception("File doesnt contain any data") : NULL;
        substr($binary, 0, 4) != "5741" ? throw new \Exception("File is not a valid Worms Armageddon Replay") : NULL;

        $this->bytes = trim(chunk_split($binary, 2, " "));
    }

    public function getChat() {
        $chat = new Formats\Chat\ChatMetadata($this->bytes);
        return $chat->read();
    }

    public function remaining() {
        return $this->length - $this->position;
    }

    public function get($length = -1) {
        if($length === 0 ) {
            return '';
        }
        
        $remaining = $this->remaining();
        
        if( $length === -1 ) {
            $length = $remaining;
        } elseif($length > $remaining ) {
            return '';
        }
        
        $data = substr($this->bytes, $this->position, $length);
        $this->position += $length;
        
        return $data;
    }
}