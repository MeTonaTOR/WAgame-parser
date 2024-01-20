## WAgame-parser
A simple parser wrote in PHP.

### Usage:
```php 
include_once "./src/init.php";
$WAgame = new MeTonaTOR\WAgame_parser("replayfile"); //sample file is provided in samples directory
```
or just loook at `example` folder.

### Functions:
`getChat` = Returns chat information

### TODO:
- [x] Read chat file properly
- [ ] Parse teamfile from replay and get its content (grave, flags, ...);
- [ ] Add detailed informations about disconnection
- [ ] Get scheme information
- [ ] Save scheme file
- [ ] Get map information 
- [ ] Save the map information