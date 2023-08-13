<?php

namespace App;

include __DIR__ . '/../autoload.php';

use App\Models\Task;
use App\Controllers\Task as TaskController;
use DateTime;


$a = new TaskController();
$b = new Task();
$c = new DateTime();

echo strlen('Mohammed');