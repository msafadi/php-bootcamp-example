<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $string = 'Mohammedmo';
    $result = strtolower(substr($string, 0, 2)) == strtolower(substr($string, -2, 2));
    
    echo "The first 2 chars and the last 2 chars in ($string) is " . match($result) {
        true => 'equal',
        false =>'not equal'
    };

    ?>
</body>
</html>