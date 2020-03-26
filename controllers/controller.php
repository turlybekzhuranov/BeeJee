<?php
    require_once "config/config.php";


    $connection = getConnection();
    require_once "models/task.php";

    $array = getTasks();
    require_once "views/index.php";