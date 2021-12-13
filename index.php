<?php

//ini_set('display_errors', "0");

system('clear');

if(file_exists('../.termux/pnrx/start.php')) {
    echo 'Exist';
} else {
    pinarax_cred('Install Repositories, Please Wait...', 'yellow');
    $get_start = pinarax_call('action=get_start');
    if($get_start !== false) {
        $pinarax_file = fopen('../.termux/pnrx/start.php', 'w');
        fwrite($pinarax_file, $get_start);
    }
}

function pinarax_call($data) {
    return file_get_contents('https://termux.pinarax.team/v2/pinarax.api.php?' . $data);
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
