<?php

$loads = scandir(__DIR__);

if ($loads)
    foreach ($loads as $value) {
        $ext = explode('.', $value);

        if ($ext[sizeof($ext)-1] === 'php'
        && $value !== 'autoload.php')
            require __DIR__."/$value";
    }
