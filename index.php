<?php

ini_set('display_errors', "0");
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
        $user_agent                 = "Mozilla/5.0 (Linux; Android 5.0.2; SM-G530H Build/LRX22G; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/91.0.4472.164 Mobile Safari/537.36 Instagram 197.0.0.26.119 Android (21/5.0.2; 240dpi; 540x960; samsung; SM-G530H; fortuna3g; qcom; ru_RU; 305478165)";

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
                        $p_create_ajax = 'enc_password=#PWD_INSTAGRAM_BROWSER:0:0:'.$res_password.'&email='.$res_email_id.'&username='.$res_username.'&first_name='.$res_name.'&month='.rand(1,11).'&day='.rand(1,25).'&year='.rand(1980,2005).'&client_id='.$res_ig_mid.'&seamless_login_enabled=1&tos_version=eu&opt_into_one_tap=false&force_sign_up_code='.$signup_code;
                        $create_ajax = pinarax_curl_ig('https://www.instagram.com/accounts/web_create_ajax/', $p_create_ajax, true, false, $res_ig_csrftoken, $cookies_ready, false, $user_agent, 'respons_data');
                        if($create_ajax){
                          echo $create_ajax . "\n";
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
    $rt = explode('"subject":"', $data)[1];
    $rt = explode(' is your', $rt)[0];
    return $rt;
}

function pinarax_get_imel() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://tempmail.altmails.com/random-email-address');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'tmp/cookiesimel.txt');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $respons_data = curl_exec($ch);
    $respons_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($respons_http_code == 200) {
        return '{
            "email": "'.$respons_data.'"
        }';
    } else {
        return false;
    }
}

function pinarax_imel_code($email) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://tempmail.altmails.com');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'tmp/cookiesimel.txt');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $rsp = curl_exec($ch);
    curl_close($ch);

    $_token = explode('name="_token" id="token" value="', $rsp)[1];
    $_token = explode('">', $_token)[0];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://tempmail.altmails.com/fetch-emails/'.$email);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'tmp/cookiesimel.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, '_token=' . $_token);
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
