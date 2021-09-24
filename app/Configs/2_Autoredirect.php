<?php

$locals = [
    "home"
];

if (!isset($_GET['local'], $_GET['nums']))
    redirect(T_PATH . createQuery([
        getQuery(['local' => 'home']),
        getQuery(['nums' => '2'])
    ]));
elseif (!in_array($_GET['local'], $locals))
    redirect(T_PATH . createQuery([
        ['local' => 'home'],
        getQuery(['nums' => '2'])
    ]));
