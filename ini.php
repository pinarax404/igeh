<?php

pinarax_get_imel();

function split_email_code($data) {
    $rt = explode('"subject":"', $data)[1];
    $rt = explode(' is your', $rt)[0];
    return $rt;
}

function pinarax_get_imel() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://m.kuku.lu/index.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'tmp/cookiesimel.txt');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $store = curl_exec($ch);

    curl_setopt($ch, CURLOPT_URL, 'https://m.kuku.lu/index.php?action=addMailAddrByOnetime&nopost=1&by_system=1&recaptcha_token=');
    $content = curl_exec($ch);

    echo $content;
}

function pinarax_imel_code($email) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://tempmail.altmails.com');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
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
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
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
