<?php

ini_set('display_errors', "0");
system('clear');

pinarax_start_create();

function rplc_mode_create($start, $end, $data) {
    $rt = explode($start, $data)[1];
    $rt = explode($end, $rt)[0];
    return $rt;
}

function cek_code($email) {
    $cek_code = pinarax_imel_code($email);
    if(strpos($cek_code, 'email_code') !== false) { $json = json_decode($cek_code, true); return $json['email_code']; } else if($cek_code == false) { return false; } else {
        sleep(2);
        $cek_code = pinarax_imel_code($email);
        if(strpos($cek_code, 'email_code') !== false) { $json = json_decode($cek_code, true); return $json['email_code']; } else if($cek_code == false) { return false; } else {
            sleep(2);
            $cek_code = pinarax_imel_code($email);
            if(strpos($cek_code, 'email_code') !== false) { $json = json_decode($cek_code, true); return $json['email_code']; } else if($cek_code == false) { return false; } else {
                sleep(2);
                $cek_code = pinarax_imel_code($email);
                if(strpos($cek_code, 'email_code') !== false) { $json = json_decode($cek_code, true); return $json['email_code']; } else if($cek_code == false) { return false; } else {
                    sleep(2);
                    $cek_code = pinarax_imel_code($email);
                    if(strpos($cek_code, 'email_code') !== false) { $json = json_decode($cek_code, true); return $json['email_code']; } else if($cek_code == false) { return false; } else {
                        sleep(2);
                        $cek_code = pinarax_imel_code($email);
                        if(strpos($cek_code, 'email_code') !== false) { $json = json_decode($cek_code, true); return $json['email_code']; } else if($cek_code == false) { return false; } else {
                            return false;
                        }
                    }
                }
            }
        }
    }
}

function pinarax_start_create() {
    $ugen = [
	"UCWEB/2.0 (Linux; U; Opera Mini/7.1.32052/30.3697; en-US; SM-G532G Build/MMB29T) U2/1.0.0 UCMini/10.9.0.946 (SpeedMode; Android 6.0.1; SM-G532G Build/MMB29T) Mobile",
	"Mozilla/5.0 (Linux; U; Android 4.2.2; ru-ru; GT-I9060 Build/JDQ39) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 6.0.1; SM-G532G Build/MMB29T; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.105 Mobile Safari/537.36 UCBrowser/11.3.0.1130 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 10; Redmi 7 Build/QKQ1.191008.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/94.0.4606.85 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 8.1.0; itel P32 Build/O11019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.45 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; U; Android 4.2.2; en-us; S5E Build/JDQ39) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1.1; SM-J120F Build/LMY47X; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/55.0.2883.91 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 8.1.0; vivo 1820 Build/O11019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/91.0.4472.120 Mobile Safari/537.36 UCBrowser/11.4.0.1180 (UCMini) Mobile",
	"UCWEB/2.0 (Linux; U; Opera Mini/7.1.32052/30.3697; US) U2/1.0.0 UCMini/11.5.2.1188 U2/1.0.0 Mobile",
	"Mozilla/5.0 (Linux; Android 10; Redmi Note 9 Pro Max Build/QKQ1.191215.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/87.0.4280.101 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 9; LT-NOTE 10S Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/92.0.4515.115 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; S40 Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/87.0.4280.101 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; IF9003 Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/91.0.4472.120 Mobile Safari/537.36 UCBrowser/11.5.3.1189 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 9; STG S30 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/86.0.4240.75 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 10; Redmi Note 9 Pro Max Build/QKQ1.191215.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.101 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 10; V2026 Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/90.0.4430.91 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 11; AC2001 Build/RP1A.201005.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/90.0.4430.66 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; U; Android 4.1.2; ru-ru; GT-I8190 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 10; Redmi 7 Build/QKQ1.191008.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.101 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 4.4.4; SM-G7200 Build/KTU84P) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/33.0.0.0 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; 5060 Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/67.0.3396.87 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 9; LM-X120 Build/PKQ1.180904.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/87.0.4280.141 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1.1; F1fw Build/LMY47V; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.96 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 6.0.1; SM-G532G Build/MMB29T; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/55.0.2883.91 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 8.1.0; TECNO B1f Build/O11019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.110 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1.1; SM-J120F Build/LMY47X; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/55.0.2883.91 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.1.2; HM 1SW Build/NJH47F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/67.0.3396.87 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 4.4.2; ASUS_Z007 Build/KVT49L) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 9; ONEPLUS A5010 Build/PKQ1.180716.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/87.0.4280.66 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 9; LM-X420 Build/PKQ1.190522.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/86.0.4240.185 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/85.0.4183.101 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.0.2; SM-A300F Build/LRX22G; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.80 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; BQru_BQru-5058 Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/68.0.3440.91 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.0; Lenovo K50-t5 Build/LRX21M) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/37.0.0.0 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; T5c Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/69.0.3497.100 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 6.0.1; SM-G532F Build/MMB29T; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/55.0.2883.91 Mobile Safari/537.36 UCBrowser/11.5.3.1189 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1.1; SM-J111F Build/LMY47V; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/55.0.2883.91 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 8.0.0; moto e5 Build/OPPS27.91-176-11-16; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/86.0.4240.185 Mobile Safari/537.36 UCBrowser/11.4.0.1180 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.0.2; vivo Y31 Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/37.0.0.0 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 4.4.4; 2014811 Build/KTU84P) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/33.0.0.0 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 6.0.1; SM-G532G Build/MMB29T; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/56.0.2924.87 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; U; Android 4.3; uz-uz; NokiaX2DS Build/JLS36C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 6.0.1; SM-G532F Build/MMB29T; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/56.0.2924.87 Mobile Safari/537.36 UCBrowser/11.4.0.1180 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 6.0.1; LS-5016 Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/50.0.2661.86 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 8.1.0; CPH1819 Build/O11019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/63.0.3239.111 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 9; SM-G611FF Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.136 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 8.1.0; Redmi 5A Build/OPM1.171019.026; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/71.0.3578.99 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1; 1201 Build/LMY47I; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.121 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 9; Redmi Note 5 Pro Build/PKQ1.180904.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/81.0.4044.111 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.1.2; Redmi 5 Plus Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/62.0.3202.84 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; U; Android 4.1.2; id-id; GT-S6810 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"UCWEB/2.0 (Linux; U; Opera Mini/7.1.32052/30.3697; es-LA; F3113 Build/33.3.A.0.131) U2/1.0.0 UCMini/10.9.0.946 (SpeedMode; Android 7.0; F3113 Build/33.3.A.0.131) Mobile",
	"Mozilla/5.0 (Linux; Android 4.4.2; F-01F Build/V10R22A) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; Micromax Q402+ Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/64.0.3282.137 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 8.1.0; SM-J701F Build/M1AJQ; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/67.0.3396.87 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1; XT1033 Build/LPBS23.13-56-2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.132 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; U; Android 4.1.2; en-gb; GT-S7392 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1.1; Mi-4c Build/LMY47V; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.96 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; Moto C Build/NRD90M.043; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/81.0.4044.111 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 9; Redmi Note 7 Pro Build/PKQ1.181203.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1; Lenovo A2010-a Build/LMY47D; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/67.0.3396.87 Mobile Safari/537.36 UCBrowser/11.4.0.1180 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 6.0; XT1068 Build/MPB24.65-34-3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/45.0.2454.95 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1.1; A37f Build/LMY47V; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/81.0.4044.117 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 9; RMX1941 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.111 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/75.0.3770.101 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1.1; ASUS_X00BD Build/LMY47V; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/46.0.2490.76 Mobile Safari/537.36 UCBrowser/11.3.0.1130 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1.1; SM-J200G Build/LMY47X; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/56.0.2924.87 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 8.0.0; SM-G570M Build/R16NW; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.110 Mobile Safari/537.36 UCBrowser/11.4.1.1138 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; 5060 Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 10; SM-N975F Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.149 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1; HUAWEI TIT-U02 Build/HUAWEITIT-U02; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1; Atom 2X Build/LMY47D; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.111 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 6.0.1; Le X526 Build/IIXOSOP5801910121S; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/49.0.2623.91 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1.1; A37fw Build/LMY47V; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/63.0.3239.111 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; A1 lite Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/56.0.2924.87 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 5.1; Infinix X510 Build/LMY47I) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/39.0.0.0 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; A1 lite Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.110 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 10; Infinix X604 Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36 UCBrowser/11.5.3.1189 (UCMini) Mobile",
	"Mozilla/5.0 (Linux; Android 7.0; SM-G615FU Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/64.0.3282.137 Mobile Safari/537.36 UCBrowser/11.5.2.1188 (UCMini) Mobile",
	"UCWEB/2.0 (Linux; U; Opera Mini/7.1.32052/30.3697; pt-BR; 5017A Build/LMY47D) U2/1.0.0 UCMini/10.9.0.946 (SpeedMode; Android 5.1; 5017A Build/LMY47D) Mobile",
	"UCWEB/2.0 (Linux; U; Opera Mini/7.1.32052/30.3697; pt-BR; VF685 Build/KOT49H) U2/1.0.0 UCMini/10.9.0.946 (SpeedMode; Android 4.4.2; VF685 Build/KOT49H) Mobile",
	"UCWEB/2.0 (Linux; U; Opera Mini/7.1.32052/30.3697; pt-BR; Coolpad 8297-T01 Build/KTU84P) U2/1.0.0 UCMini/10.9.0.946 (SpeedMode; Android 4.4.4; Coolpad 8297-T01 Build/KTU84P) Mobile",
	"UCWEB/2.0 (Linux; U; Opera Mini/7.1.32052/30.3697; en-US; Lenny4 Build/NRD90M) U2/1.0.0 UCMini/10.9.0.946 (SpeedMode; Android 7.0; Lenny4 Build/NRD90M) Mobile",
	"UCWEB/2.0 (Linux; U; Opera Mini/7.1.32052/30.3697; ru; Android Build/KOT49H) U2/1.0.0 UCMini/10.9.0.946 (SpeedMode; Android 4.4.2; Android Build/KOT49H) Mobile"
];
    shuffle($ugen);

    $get_ip                         = pinarax_curl_attr('https://ipwhois.app/json/');
    if($get_ip !== false) {
        $res_get_ip                 = json_decode($get_ip, true);
        echo "\033[1;37mIP : " . $res_get_ip['ip'] . " | Country : " . $res_get_ip['country'] . "\033[1;37m\n";
    } else {
        echo "\033[1;37mIP : null | Country : null\033[1;37m\n";
    }

    $curl_cookies1                  = pinarax_curl_ig('https://www.instagram.com/data/shared_data/', false, false, false, '', '', true, '', 'respons_data');
    $curl_cookies2                  = pinarax_curl_ig('https://www.instagram.com/web/__mid/', false, false, false, '', '', false, '', 'respons_data');
    $curl_user                      = pinarax_curl_attr('https://randomuser.me/api/?gender=female&nat=us');
    $curl_email                     = pinarax_get_imel();
    $time                           = time();

    if($curl_cookies1 !== false && $curl_cookies2 !== false && $curl_user !== false && $curl_email !== false) {
        $json_generate_user         = json_decode($curl_user, true);
        $json_generate_email        = json_decode($curl_email, true);
        $user_agent                 = $ugen[0];

        $res_ig_ig_did              = rplc_mode_create('"device_id":"', '","', $curl_cookies1);
        $res_ig_mid                 = $curl_cookies2;
        $res_ig_csrftoken           = rplc_mode_create('"csrf_token":"', '","', $curl_cookies1);

        $cookies_ready              = 'ig_did=' . $res_ig_ig_did . '; mid=' . $res_ig_mid . '; csrftoken=' . $res_ig_csrftoken . ';';
        $res_name                   = strtolower($json_generate_user['results']['0']['name']['first'] . ' ' . $json_generate_user['results']['0']['name']['last']);
        $res_password               = 'badaklepas123';
        $res_email_id               = $json_generate_email['email'];

        $p_curl_username = 'name='.$res_name;
        $curl_username = pinarax_curl_ig('https://www.instagram.com/accounts/username_suggestions/', $p_curl_username, true, false, $res_ig_csrftoken, $cookies_ready, false, '', 'respons_data');
        if($curl_username !== false  && strpos($curl_username, 'suggestions') !== false) {
            $res_curl_username = json_decode($curl_username, true);
            $res_username = $res_curl_username['suggestions'][0];
            $p_submit_email = 'device_id='.$res_ig_mid.'&email='.$res_email_id;
            $submit_email = pinarax_curl_ig('https://i.instagram.com/api/v1/accounts/send_verify_email/', $p_submit_email, true, false, $res_ig_csrftoken, $cookies_ready, false, '', 'respons_data');
            if($submit_email !== false && strpos($submit_email, 'email_sent') !== false) {
                echo "\033[1;37mWaiting Email Code : ";
                sleep(5);
                $cek_code = cek_code($res_email_id);
                if($cek_code !== false) {
                    echo $cek_code . "\033[1;37m\n";
                    $p_submit_code = 'code='.$cek_code.'&device_id='.$res_ig_mid.'&email='.$res_email_id;
                    $submit_code = pinarax_curl_ig('https://i.instagram.com/api/v1/accounts/check_confirmation_code/', $p_submit_code, true, false, $res_ig_csrftoken, $cookies_ready, false, $user_agent, 'respons_data');
                    if($submit_code !== false  && strpos($submit_code, 'signup_code') !== false) {
                        $res_submit_code = json_decode($submit_code, true);
                        $signup_code = $res_submit_code['signup_code'];
                        $p_create_ajax = 'enc_password=#PWD_INSTAGRAM_BROWSER:0:0:'.$res_password.'&email='.$res_email_id.'&username='.$res_username.'&first_name='.$res_name.'&month=10&day=21&year=2002&client_id='.$res_ig_mid.'&seamless_login_enabled=1&tos_version=eu&opt_into_one_tap=true&force_sign_up_code='.$signup_code;
                        $create_ajax = pinarax_curl_ig('https://www.instagram.com/accounts/web_create_ajax/', $p_create_ajax, true, false, $res_ig_csrftoken, $cookies_ready, false, $user_agent, 'respons_data');
                        if($create_ajax){
                            $p_login_ajax = 'enc_password=#PWD_INSTAGRAM_BROWSER:0:'.time().':'.$res_password.'&username='.$res_username.'&queryParams=%7B%7D&optIntoOneTap=false&stopDeletionNonce=&trustedDeviceRecords=%7B%7D';
                            $login_ajax = pinarax_curl_ig('https://www.instagram.com/accounts/login/ajax/', $p_login_ajax, true, false, $res_ig_csrftoken, $cookies_ready, true, '', 'respons_data');
                            if($login_ajax) {
                                $cek_ig_account = pinarax_cek_ig_account('https://www.instagram.com/' . $res_username . '/?__a=1');
                                if($cek_ig_account !== false && strpos($cek_ig_account, 'profile_pic_url') !== false && strpos($cek_ig_account, 'username') !== false) {
                                    echo "\033[1;32m✔ \033[1;37mCreate : \033[1;32mSuccess\033[1;37m\n";
                                    echo "\033[1;32m✔ \033[1;37mUsername : \033[1;32m" . $res_username. "\033[1;37m\n";
                                    echo "\033[1;32m✔ \033[1;37mEmail : \033[1;32m" . $res_email_id. "\033[1;37m\n";
                                    echo "\033[1;37m========================================\033[1;37m\n";
                                    file_put_contents("akun.txt", $res_username . " | " . $res_password . "\n", FILE_APPEND);
                                    pinarax_start_create();
                                } else {
                                    echo "\033[1;33m✘ \033[1;37mCreate : \033[1;33mCheckpoint\033[1;37m\n";
                                    echo "\033[1;33m✘ \033[1;37mUsername : \033[1;33m" . $res_username. "\033[1;37m\n";
                                    echo "\033[1;33m✘ \033[1;37mEmail : \033[1;33m" . $res_email_id. "\033[1;37m\n";
                                    echo "\033[1;37m========================================\033[1;37m\n";
                                    pinarax_start_create();
                                }
                            } else {
                               pinarax_start_create();
                            }
                        } else {
                            pinarax_start_create();
                        }
                    } else {
                        pinarax_start_create();
                    }
                } else {
                    echo "\033[1;31mFailed\033[1;37m\n";
                    pinarax_start_create();
                }
            } else {
                echo "\033[1;31mError Submitting Email...\033[1;37m\n";
                pinarax_start_create();
            }
        } else {
            pinarax_start_create();
        }
    } else {
        pinarax_start_create();
    }
}

function pinarax_curl_attr($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
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

function pinarax_curl_ig($url, $data, $httpheader, $header, $csrftoken, $in_cookies, $save_cookies, $useragent, $showresult) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    if($httpheader) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-csrftoken: ' . $csrftoken,
            'user-agent: ' . $useragent,
            'cookie: ' . $in_cookies
        ));
    }
    if($data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    if($save_cookies) {
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'tmp/cookiesig.txt');
    }
    if($header) {
        curl_setopt($ch, CURLOPT_HEADER, true);
    } else {
        curl_setopt($ch, CURLOPT_HEADER, false);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $respons_data = curl_exec($ch);
    $respons_header = substr($respons_data, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
    $respons_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($respons_http_code == 200) {
        if($showresult == 'respons_data') {
            return $respons_data;
        } else if($showresult == 'respons_header') {
            return $respons_header;
        }
    } else {
        return false;
    }
}

function pinarax_cek_ig_account($url) {
    $ch  = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'origin: https://www.instagram.com',
        'authority: www.instagram.com',
        'method: GET',
        'upgrade-insecure-requests: 1',
        'Host: www.instagram.com',
        'content-type: application/x-www-form-urlencoded',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'accept-language:ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7,uk;q=0.6',
        'accept-encoding: deflate, br',
        "Referer: https://www.instagram.com",
        'Connection: keep-alive',
        'cache-control: max-age=0',
        'user-agent: Mozilla/5.0 (Linux; U; Android 2.3.6; fa-fa; GT-S5570I Build/GINGERBREAD) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',
    ));
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'tmp/cookiesig.txt');
    $respons_data = curl_exec($ch);
    $respons_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($respons_http_code == 200) {
        return $respons_data;
    } else {
        return false;
    }
}

// imel


function split_email_code($data) {
    $rt = explode('no-reply@mail.instagram.com</td><td style="font-weight:bold;"><a href="#">', $data)[1];
    $rt = explode(' is your Instagram code', $rt)[0];
    return $rt;
}

function pinarax_get_imel() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://ese.kr/?pb=6549');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'tmp/cookiesimel.txt');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $respons_data = curl_exec($ch);
    $respons_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($respons_http_code == 200) {
        $em = explode('<input type="search" name="mailbox" value="', $respons_data)[1];
        $em = explode('"', $em)[0];
        return '{
            "email": "'.$em.'"
        }';
    } else {
        return false;
    }
}

function pinarax_imel_code($email) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://ese.kr/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'tmp/cookiesimel.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'mail_id=&mail_mode=text&lang=en&mailbox=' . $email);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $respons_data = curl_exec($ch);
    $respons_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($respons_http_code == 200) {
        if(strpos($respons_data, 'Instagram') !== false) {
            $respons_code = split_email_code($respons_data);
            //echo $respons_code;
            return '{
                "email_code": "'.$respons_code.'"
            }';
        } else {
            return 'kosong';
        }
    } else {
        return false;
    }
}
