## WAgame-parser
A simple parser wrote in PHP.

### Usage:
`php -f parser.php <Your WAgame file>`

### Sample Result for [this replay file](https://www.tus-wa.com/leagues/game-224860/) (as of current file) (green: game generated, red: script generated):
```diff
>> php -f parser.php replay5.WAgame
- [Player 00] hf
+ [UC`Triad`dS] hf
- [Player 02] funz
+ [Xrayez`Che] funz
- [Player 03] noty
+ [UC`schaf`b2b] noty
- [Player 03] don't want hat!
+ [UC`schaf`b2b] don't want hat!
- [Player 01] xD
+ [Korydex-che] xD
- [Player 02] :D
+ [Xrayez`Che] :D
- [Player 00] ns
+ [UC`Triad`dS] ns
- [Player 01] vns
+ [Korydex-che] vns
...
```

### TODO:
- [x] Read chat file properly
- [ ] Add usernames instead of 'Player XX'
- [ ] Add detailed informations about disconnection
