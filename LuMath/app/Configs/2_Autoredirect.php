<?php

if (!isset($_GET['local'], $_GET['nums']))
    redirect(T_PATH . createQuery([
        getQuery(['local' => 'home']),
        getQuery(['nums' => '2'])
    ]));
