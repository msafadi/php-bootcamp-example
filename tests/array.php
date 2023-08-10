<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php
        $arr = [
            7 => 'XX',
            1,
            2,
            'x',
            1 => 'a',
            1.25 => 'b',
            '' => 'c',
            false => 'd',
            'e',
            null => null,
        ];

        $first = array_shift($arr);
        var_dump( $first, $arr );

        foreach ($arr as $value) {
            echo $value;
        }

        var_dump($arr);
        ?>

    </pre>
</body>
</html>