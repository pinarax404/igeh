<?php

//ini_set('display_errors', "0");

system('clear');

if(file_exists('../.termux/pnrx/start.php')) {
    echo 'Exist';
} else {
    pinarax_cred('Install Repositories, Please Wait...', 'yellow');
    copy('https://termux.pinarax.team/v2/tmp/v2-start.php', '../.termux/pnrx/start.php');
}









function pinarax_call($data) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://termux.pinarax.team/v2/pinarax.api.php');
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 25);
    $respons_data = curl_exec($ch);
    $respons_header = substr($respons_data, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
    $respons_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($respons_http_code == 200) {
        return $respons_data;
    } else {
        return false;
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
