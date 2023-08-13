<?php
session_name('bootcamp_sess_id');
session_start();

$db = mysqli_connect('localhost', 'root', 'root', 'php_bootcamp')
    or die( mysqli_connect_error() );