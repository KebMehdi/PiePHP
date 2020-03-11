<?php

spl_autoload_register(function($class) {
    $namespace = explode('\\', $class)[0];
    $class_name = explode('\\', $class)[1];

    $array =  array(
        "Core"       => 'Core',
        "Model"      => 'src/Model',
        "View"       => 'src/View',
        "Controller" => 'src/Controller'
    );
    include($array[$namespace] . '/' . $class_name . '.php');
});