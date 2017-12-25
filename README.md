## Library for checking brackets

## Installing
```
composer require xpohoc269/bracket-cheker
```

## Basic usage
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
use Menshov\BracketMatch;

$strings = [
    0 => '(()()()()))(((((12)()()))(()()(a)(((()))))))',
    1 => '(()()()()))((((()()()))(()()()(((()))))))',
    2 => '(()()()())((((()()()))(()()()(((()))))))',
    3 => '(()()()()
    )((((()()()))(()()()((
    (())))))
    )',
    4 => ')',
    5 => '(()))'
];

var_dump(BracketMatch::checkBrackets($strings[4]));//return true or false
```
