<?php
// declare(strict_types=1);


function findText(array $strings, &$idx): string {
    $max = 0;
    $longest = '';
    foreach ($strings as $i => $string) {
        $len = strlen($string);
        if ($len > $max) {
            $max = $len;
            $longest = $string;
            $idx = $i;
        }
    }

    return $longest;
}

$texts = [
    'hi my name is ali',
    'i am from palestine',
    'welcome from palestine',
];

$idx = 1000;
echo findText($texts, $idx);
echo "index: " . $idx;
exit;




function callme(string $greet = 'hi', string $name = 'me', int $end = 1): string {
    return "$greet  {$name}{$end}";
}

echo @callme(name: 'mohammed', greet: 'hello', end: 1.5);

echo @$test;

exit;

function test() {
    $message = 'hello';
    $name = 'mohammed';

    $greet = function() use ($message, $name) {
        echo $message . $name;
    };

    $message = 'hi';

    $greet();
}

test();

$name = 'mohammed';

$func = fn($greet) => $greet . ' ' . $name;

echo $func('Hi');

