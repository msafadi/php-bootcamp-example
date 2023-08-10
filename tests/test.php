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
        echo "Line 1 \n Line 2";
        ?>
    </pre>
    <?php
    $a = 'a1';
    // $a = $a + 1;
    // echo $a;

    $name = bindec('11');
    
    var_dump( 3 <=> 2 );
    exit;
    
    $$name = 'safadi';



    if ($name) {
        echo 'TRUE';
    }
    exit;
    
    $fruit = 'apple';


    ?>
    
    <?= "<b>Line 1</b> <br> Line 2" ?>
    
    <?= $fruit ?>
</body>
</html>