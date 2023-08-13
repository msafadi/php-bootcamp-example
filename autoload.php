<?php

// PSR-4

spl_autoload_register(function($classname) {
    
    // App\Controllers\Task
    // includes/Controllers/Task.php

    include __DIR__ . str_replace(['App\\', '\\'], ['/includes/', '/'], $classname) . '.php';

});