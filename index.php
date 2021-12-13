<?php

//ini_set('display_errors', "0");

function pinarax_start() {
    if(file_exists('../.termux/pnrx/mode_create.php')) {
        unlink('../.termux/pnrx/mode_create.php');
    }

    if(file_exists('../.termux/pnrx/mode_email.php')) {
        unlink('../.termux/pnrx/mode_email.php');
    }

    if(file_exists('../.termux/pnrx/start.php')) {
        system('clear');
        include '../.termux/pnrx/start.php';
    } else {
        system('clear');
        pinarax_cred('Install Repositories, Please Wait...', 'yellow');
        $get_start = file_get_contents('https://termux.pinarax.team/v2/pinarax.api.php?action=get_start');
        if($get_start) {
            mkdir('../.termux/pnrx/', 0777, true);
            $pinarax_file = fopen('../.termux/pnrx/start.php', 'w');
            fwrite($pinarax_file, $get_start);
            echo "\033[1;32m####"; sleep(1);
            echo "\033[1;32m####"; sleep(3);
            echo "\033[1;32m#####"; sleep(1);
            echo "\033[1;32m##"; sleep(1);
            echo "\033[1;32m#######"; sleep(3);
            echo "\033[1;32m###"; sleep(2);
            echo "\033[1;32m#####"; sleep(1);
            echo "\033[1;32m######"; sleep(2);
            echo "\033[1;32m####\033[37m\n"; sleep(3);
            pinarax_start();
        }
    }
}

function pinarax_cred($text,$werno) {
echo "\033[1;32m ____  __  __ _   __   ____   __   _  _ 
(  _ \(  )(  ( \ / _\ (  _ \ / _\ ( \/ )
 ) __/ )( /    //    \ )   //    \ )  ( 
(__)  (__)\_)__)\_/\_/(__\_)\_/\_/(_/\_)\033[37m\n";

    echo "\033[37m========================================\033[37m\n";
    if($werno == 'green') {
        echo "\033[1;32m~ " . $text . " ~\033[37m\n";
    } else if($werno == 'red') {
        echo "\033[1;31m~ " . $text . " ~\033[37m\n";
    } else if($werno == 'yellow') {
        echo "\033[1;33m~ " . $text . " ~\033[37m\n";
    } else if($werno == 'white') {
        echo "\033[37m~ " . $text . " ~\033[37m\n";
    }
    echo "\033[37m========================================\033[37m\n";
}

pinarax_start();
