<?php

//ini_set('display_errors', "0");
system('clear');

echo "\033[1;32m ____  __  __ _   __   ____   __   _  _ 
(  _ \(  )(  ( \ / _\ (  _ \ / _\ ( \/ )
 ) __/ )( /    //    \ )   //    \ )  ( 
(__)  (__)\_)__)\_/\_/(__\_)\_/\_/(_/\_)\033[1;37m\n";
echo "\033[1;37m========================================\033[1;37m\n";

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
    $u_gen = [
        "Mozilla/5.0 (Linux; Android 10; SM-G973F Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/86.0.4240.198 Mobile Safari/537.36 Instagram 166.1.0.42.245 Android (29/10; 420dpi; 1080x2042; samsung; SM-G973F; beyond1; exynos9820; en_GB; 256099204)",
        "Mozilla/5.0 (iPhone; CPU iPhone OS 14_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 142.0.0.22.109 (iPhone12,5; iOS 14_1; en_US; en-US; scale=3.00; 1242x2688; 214888322) NW/1",
        "Mozilla/5.0 (iPhone; CPU iPhone OS 13_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 160.1.0.31.120 (iPhone8,1; iOS 13_5_1; en_US; en-US; scale=2.00; 750x1334; 246979827) NW/1",
        "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 123.1.0.26.115 (iPhone11,8; iOS 13_3; en_US; en-US; scale=2.00; 828x1792; 190542906)",
        "Mozilla/5.0 (Linux; Android 10; SM-A102U Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36 Instagram 167.0.0.24.120 Android (29/10; 320dpi; 720x1402; samsung; SM-A102U; a10e; exynos7884B; en_US; 256966589)",
        "Mozilla/5.0 (Linux; Android 9; SM-G955U Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/84.0.4147.111 Mobile Safari/537.36 Instagram 153.0.0.34.96 Android (28/9; 420dpi; 1080x2094; samsung; SM-G955U; dream2qltesq; qcom; en_US; 236572377)",
        "Mozilla/5.0 (iPhone; CPU iPhone OS 13_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 152.0.0.21.114 (iPhone12,3; iOS 13_6_1; en_US; en-US; scale=3.00; 1125x2436; 234053878)",
        "Mozilla/5.0 (Linux; Android 9; SM-G960U Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/85.0.4183.81 Mobile Safari/537.36 Instagram 156.0.0.26.109 Android (28/9; 480dpi; 1080x2076; samsung; SM-G960U; starqltesq; qcom; en_US; 240726484)",
        "Mozilla/5.0 (Linux; Android 10; SM-N975U Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/84.0.4147.89 Mobile Safari/537.36 Instagram 135.0.0.28.119 Android (29/10; 480dpi; 1080x2051; samsung; SM-N975U; d2q; qcom; en_US; 206670927)",
        "Mozilla/5.0 (Linux; Android 10; SM-G960U Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/84.0.4147.125 Mobile Safari/537.36 Instagram 156.0.0.26.109 Android (29/10; 720dpi; 1440x2744; samsung; SM-G960U; starqltesq; qcom; en_US; 240726484)",
        "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 123.1.0.26.115 (iPhone11,6; iOS 13_3; en_US; en-US; scale=3.00; 1242x2688; 190542906)",
        "Mozilla/5.0 (iPhone; CPU iPhone OS 12_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 181.1.0.27.117 (iPhone9,4; iOS 12_4_1; es_ES; es-ES; scale=2.88; 1080x1920; 282277724)",
        "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 123.1.0.26.115 (iPhone8,1; iOS 13_3; en_US; en-US; scale=2.00; 750x1334; 190542906)",
        "Mozilla/5.0 (Linux; U; Android 4.1.2; vi-vn; IM-A870L Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Ði?n tho?iSafari/534.30 Instagram 9.5.0 Android (16/4.1.2; 320dpi; 720x1280; PANTECH/VEGA; IM-A870L; ef52l; qcom; vi_VN)",
        "Mozilla/5.0 (Linux; U; Android 4.1.2; vi-vn; IM-A830S Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Ði?n tho?iSafari/534.30 Instagram 9.4.5 Android (16/4.1.2; 320dpi; 720x1232; PANTECH/SKY; IM-A830S; ef46l; qcom; vi_VN)",
        "Mozilla/5.0 (Linux; Android 4.4.2; X325–Locked to Life Wireless Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36 Instagram 10.9.0 Android (19/4.4.2; 160dpi; 320x480; alps/X325; X325–Locked to Life WiOP/",
        "Mozilla/5.0 (Linux; Android 8.1.0; motorola one Build/OPKS28.63-18-3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.80 Mobile Safari/537.36 Instagram 72.0.0.21.98 Android (27/8.1.0; 320dpi; 720x1362; motorola; motorola one; deen_sprout; qcom; pt_BR; 132081645)",
        "Mozilla/5.0 (Linux; Android 7.0; Lenovo K33b36 Build/NRD90N; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/65.0.3325.109 Mobile Safari/537.36 Instagram 41.0.0.13.92 Android (24/7.0; 480dpi; 1080x1920; LENOVO/Lenovo; Lenovo K33b36; K33b36; qcom; pt_BR; 103516666)",
        "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 123.1.0.26.115 (iPhone10,5; iOS 13_3; en_US; en-US; scale=2.61; 1080x1920; 190542906)",
        "Mozilla/5.0 (Linux; Android 5.0.1; LG-H342 Build/LRX21Y; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/65.0.3325.109 Mobile Safari/537.36 Instagram 40.0.0.14.95 Android (21/5.0.1; 240dpi; 480x786; LGE/lge; LG-H342; c50ds; c50ds; pt_BR; 102221277)"
    ];
    shuffle($u_gen);

    $prx = [
        "nl-012.whiskergalaxy.com:443",
        "nl-007.whiskergalaxy.com:443",
        "nl-016.whiskergalaxy.com:443",
        "nl-004.whiskergalaxy.com:443",
        "nl-017.whiskergalaxy.com:443",
        "nl-022.whiskergalaxy.com:443",
        "nl-021.whiskergalaxy.com:443",
        "nl-018.whiskergalaxy.com:443",
        "no-007.whiskergalaxy.com:443",
        "no-005.whiskergalaxy.com:443",
        "no-004.whiskergalaxy.com:443",
        "ro-007.whiskergalaxy.com:443",
        "ro-004.whiskergalaxy.com:443",
        "tr-012.whiskergalaxy.com:443",
        "tr-010.whiskergalaxy.com:443",
        "tr-015.whiskergalaxy.com:443",
        "tr-007.whiskergalaxy.com:443",
        "tr-008.whiskergalaxy.com:443"
    ];
    shuffle($prx);

    $curl_cookies                   = pinarax_curl_ig('https://www.instagram.com/data/shared_data/?__a=1', false, false, true, '', '', false, '', 'respons_header', false);
    $curl_user                      = pinarax_curl_attr('https://randomuser.me/api/?gender=female&nat=us');
    $curl_email                     = pinarax_get_imel();
    $time                           = time();

    if($curl_cookies !== false && $curl_user !== false && $curl_email !== false) {
        $json_generate_user         = json_decode($curl_user, true);
        $json_generate_email        = json_decode($curl_email, true);
        $user_agent                 = $u_gen[0];

        $res_ig_ig_did              = rplc_mode_create('ig_did=', ';', $curl_cookies);
        $res_ig_mid                 = rplc_mode_create('mid=', ';', $curl_cookies);
        $res_ig_csrftoken           = rplc_mode_create('csrftoken=', ';', $curl_cookies);

        $cookies_ready              = 'ig_did=' . $res_ig_ig_did . '; mid=' . $res_ig_mid . '; csrftoken=' . $res_ig_csrftoken . ';';
        $res_name                   = strtolower($json_generate_user['results']['0']['name']['first'] . ' ' . $json_generate_user['results']['0']['name']['last']);
        $res_password               = 'badaklepas123';
        $res_email_id               = $json_generate_email['email'];

        $p_curl_username = 'name='.$res_name;
        $curl_username = pinarax_curl_ig('https://www.instagram.com/accounts/username_suggestions/', $p_curl_username, true, false, $res_ig_csrftoken, $cookies_ready, false, '', 'respons_data', false);
        if($curl_username !== false  && strpos($curl_username, 'suggestions') !== false) {
            $res_curl_username = json_decode($curl_username, true);
            $res_username = $res_curl_username['suggestions'][0];
            $p_submit_email = 'device_id='.$res_ig_mid.'&email='.$res_email_id;
            $submit_email = pinarax_curl_ig('https://i.instagram.com/api/v1/accounts/send_verify_email/', $p_submit_email, true, false, $res_ig_csrftoken, $cookies_ready, false, $user_agent, 'respons_data', false);
            if($submit_email !== false && strpos($submit_email, 'email_sent') !== false) {
                echo "\033[1;37mWaiting Email Code : ";
                sleep(5);
                $cek_code = cek_code($res_email_id);
                if($cek_code !== false) {
                    echo $cek_code . "\033[1;37m\n";
                    $p_submit_code = 'code='.$cek_code.'&device_id='.$res_ig_mid.'&email='.$res_email_id;
                    $submit_code = pinarax_curl_ig('https://i.instagram.com/api/v1/accounts/check_confirmation_code/', $p_submit_code, true, false, $res_ig_csrftoken, $cookies_ready, false, '', 'respons_data', false);
                    if($submit_code !== false  && strpos($submit_code, 'signup_code') !== false) {
                        $res_submit_code = json_decode($submit_code, true);
                        $signup_code = $res_submit_code['signup_code'];
                        $p_create_ajax = 'enc_password=#PWD_INSTAGRAM_BROWSER:0:'.time().':'.$res_password.'&email='.$res_email_id.'&username='.$res_username.'&first_name='.$res_name.'&month='.rand(1,11).'&day='.rand(1,25).'&year='.rand(1990,1999).'&client_id='.$res_ig_mid.'&seamless_login_enabled=1&tos_version=row&opt_into_one_tap=false&force_sign_up_code='.$signup_code;
                        $create_ajax = pinarax_curl_ig('https://www.instagram.com/accounts/web_create_ajax/', $p_create_ajax, true, false, $res_ig_csrftoken, $cookies_ready, false, $user_agent, 'respons_data', $prx[0]);
                        if($create_ajax){
                            $p_login_ajax = 'enc_password=#PWD_INSTAGRAM_BROWSER:0:'.time().':'.$res_password.'&username='.$res_username.'&queryParams=%7B%7D&optIntoOneTap=false&stopDeletionNonce=&trustedDeviceRecords=%7B%7D';
                            $login_ajax = pinarax_curl_ig('https://www.instagram.com/accounts/login/ajax/', $p_login_ajax, true, false, $res_ig_csrftoken, $cookies_ready, true, '', 'respons_data', false);
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

function pinarax_curl_ig($url, $data, $httpheader, $header, $csrftoken, $in_cookies, $save_cookies, $useragent, $showresult, $proxy) {
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
    if($proxy) {
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTPS);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 25);
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
    curl_setopt($ch, CURLOPT_TIMEOUT, 25);
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
    $rt = explode('"subject":"', $data)[1];
    $rt = explode(' is your Instagram code', $rt)[0];
    return $rt;
}

function pinarax_get_imel() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://tempmailo.com/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'tmp/cookiesimel.txt');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $rsp = curl_exec($ch);
    curl_close($ch);

    $_token = explode('name="__RequestVerificationToken" type="hidden" value="', $rsp)[1];
    $_token = explode('"', $_token)[0];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://tempmailo.com/changemail');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'requestverificationtoken: ' . $_token
    ));
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'tmp/cookiesimel.txt');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $respons_data = curl_exec($ch);
    $respons_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($respons_http_code == 200) {
        if(strpos($respons_data, 'ryteto.me') !== false || strpos($respons_data, 'onekisspresave.com') !== false || strpos($respons_data, 'norwegischlernen.info') !== false || strpos($respons_data, 'kellychibale-researchgroup-uct.com') !== false || strpos($respons_data, 'thecarinformation.com') !== false || strpos($respons_data, 'musiccode.me') !== false) {
            return '{
                "email": "'.$respons_data.'"
            }';
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function pinarax_imel_code($email) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://tempmailo.com/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'tmp/cookiesimel.txt');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $rsp = curl_exec($ch);
    curl_close($ch);

    $_token = explode('name="__RequestVerificationToken" type="hidden" value="', $rsp)[1];
    $_token = explode('"', $_token)[0];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://tempmailo.com/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'requestverificationtoken: ' . $_token,
        'content-type: application/json;charset=UTF-8'
    ));
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'tmp/cookiesimel.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"mail":"'.$email.'"}');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $respons_data = curl_exec($ch);
    $respons_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($respons_http_code == 200) {
        if(strpos($respons_data, 'Instagram') !== false) {
            $respons_code = split_email_code($respons_data);
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
