<?php

namespace MeTonaTOR\Enums;

class TeamColors {
    const RED = '10';
    const BLUE = '11';
    const GREEN = '12';
    const YELLOW = '13';
    const MAGENTA = '14';
    const CYAN = '15';
}

class Regexes {
    const CHAT = '/0F (00|01|02|03|04|05|06) (00|01|02|03|04|05|06|FF) (f.|0.|1.) (.*?) 00/mi';
    const SCHEME = '/53 43 48 4D (01|02|03) (.*) 00/mi';
}