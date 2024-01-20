<?php

include_once "../src/init.php";
$WAgame = new MeTonaTOR\WAgame_parser("samples/sample.WAgame");

echo $WAgame->getChat();

?>